<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CrudBuilderController extends Controller
{
    public function index()
    {
        return view('pages.crud-builder.index');
    }

    public function edit()
    {
        $tables = $this->getTablesList();

        return view('pages.crud-builder.edit', compact('tables'));
    }

    private function getTablesList()
    {
        $tables = \Illuminate\Support\Facades\Schema::getTables();
        $tableNames = array_map(function ($table) {
            return is_array($table) ? $table['name'] : $table->name;
        }, $tables);

        // Filter out system tables
        return array_values(array_filter($tableNames, function ($name) {
            return ! in_array($name, ['migrations', 'failed_jobs', 'password_reset_tokens', 'personal_access_tokens', 'sessions']);
        }));
    }

    public function getTables()
    {
        return response()->json($this->getTablesList());
    }

    public function getColumns(Request $request)
    {
        $tableName = $request->query('table');
        if (! $tableName) {
            return response()->json(['error' => 'Table name required'], 400);
        }

        if (! \Illuminate\Support\Facades\Schema::hasTable($tableName)) {
            return response()->json([], 404);
        }

        $columns = \Illuminate\Support\Facades\Schema::getColumns($tableName);
        $columnDetails = [];

        foreach ($columns as $col) {
            $colArray = (array) $col;
            $columnDetails[] = [
                'name' => $colArray['name'],
                'type_name' => $colArray['type_name'] ?? 'unknown',
                'type' => $colArray['type'] ?? null,
                'nullable' => $colArray['nullable'] ?? false,
                'default' => $colArray['default'] ?? null,
                'auto_increment' => $colArray['auto_increment'] ?? false,
                'comment' => $colArray['comment'] ?? '',
                'collation' => $colArray['collation'] ?? null,
                'precision' => $colArray['precision'] ?? null,
                'scale' => $colArray['scale'] ?? null,
                'unsigned' => $colArray['unsigned'] ?? false,
                'virtual_as' => $colArray['virtual_as'] ?? null,
                'stored_as' => $colArray['stored_as'] ?? null,
            ];
        }

        return response()->json($columnDetails);
    }

    public function getTableDetails(Request $request)
    {
        $tableName = $request->query('table');
        if (! $tableName) {
            return response()->json(['error' => 'Table name required'], 400);
        }

        $columns = \Illuminate\Support\Facades\Schema::getColumns($tableName);

        $fields = [];
        $relationships = [];

        foreach ($columns as $col) {
            $col = (array) $col;
            if (in_array($col['name'], ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                continue;
            }

            $fields[] = [
                'name' => $col['name'],
                'type' => $this->mapDbTypeToFieldType($col['type_name']),
                'nullable' => $col['nullable'] ?? false,
                'default' => $col['default'] ?? null,
                'auto_increment' => $col['auto_increment'] ?? false,
                'comment' => $col['comment'] ?? '',
                'collation' => $col['collation'] ?? null,
                'precision' => $col['precision'] ?? null,
                'scale' => $col['scale'] ?? null,
                'unsigned' => $col['unsigned'] ?? false,
            ];

            // Guess Relationship
            if (Str::endsWith($col['name'], '_id')) {
                $relatedTable = Str::plural(Str::replaceLast('_id', '', $col['name']));
                // Check if table exists (optional, but good)
                if (\Illuminate\Support\Facades\Schema::hasTable($relatedTable)) {
                    $relationships[] = [
                        'type' => 'belongsTo',
                        'related_table' => $relatedTable,
                        'foreign_key' => $col['name'],
                    ];
                }
            }
        }

        return response()->json([
            'model_name' => Str::studly(Str::singular($tableName)),
            'table_name' => $tableName,
            'fields' => $fields,
            'relationships' => $relationships,
        ]);
    }

    protected function mapDbTypeToFieldType($dbType)
    {
        return match ($dbType) {
            'varchar', 'char', 'string' => 'string',
            'text', 'mediumtext', 'longtext' => 'text',
            'int', 'integer', 'bigint', 'smallint', 'tinyint' => 'integer',
            'decimal', 'float', 'double' => 'decimal',
            'boolean', 'tinyint(1)' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'dateTime',
            'json' => 'json',
            'enum' => 'enum',
            default => 'string'
        };
    }

    public function generate(Request $request)
    {
        $request->validate([
            'model_name' => 'required|string',
            'table_name' => 'required|string',
            'fields' => 'required|array',
            'fields.*.name' => 'required|string',
            'fields.*.type' => 'required|string',
            'components' => 'sometimes|array',
        ]);

        $modelName = Str::studly($request->model_name);
        $tableName = Str::snake($request->table_name);
        $fields = array_values(array_filter($request->fields, function ($f) {
            return isset($f['name']) && trim($f['name']) !== '';
        }));
        $components = $request->components ?? null;
        $existingChanges = $request->input('existing', []);

        // Process Relationships to map columns correctly
        $relationships = array_map(function ($rel) {
            if (isset($rel['local_column']) || isset($rel['related_column'])) {
                $local = $rel['local_column'] ?? null;
                $related = $rel['related_column'] ?? null;
                $type = $rel['type'];

                if ($type === 'belongsTo') {
                    $rel['foreign_key'] = $local;
                    $rel['related_key'] = $related;
                } elseif ($type === 'hasMany' || $type === 'hasOne') {
                    $rel['foreign_key'] = $related;
                    $rel['related_key'] = $local;
                }
            }

            return $rel;
        }, $request->relationships ?? []);

        // Merge with modified relationships from the form
        if ($request->has('modified_relationships')) {
            $modifiedRels = json_decode($request->modified_relationships, true);
            if (is_array($modifiedRels)) {
                $relationships = array_merge($relationships, $modifiedRels);
            }
        }

        // Check if table exists
        $tableExists = \Illuminate\Support\Facades\Schema::hasTable($tableName);

        // Filter new fields only for migration if table exists
        $newFields = [];
        if ($tableExists) {
            $existingColumns = \Illuminate\Support\Facades\Schema::getColumnListing($tableName);
            foreach ($fields as $field) {
                // Check if field is marked as new OR if it's not in DB
                if ((isset($field['is_new']) && $field['is_new'] == '1') || ! in_array($field['name'], $existingColumns)) {
                    $newFields[] = $field;
                }
            }
        } else {
            $newFields = $fields;
        }

        try {
            // 1. Generate Migration (Create or Update)
            if (! $tableExists) {
                // CREATE TABLE
                $migrationContent = $this->generateCreateMigration($tableName, $newFields, $relationships);
                $migrationName = date('Y_m_d_His')."_create_{$tableName}_table.php";
                File::put(database_path("migrations/{$migrationName}"), $migrationContent);
            } elseif (! empty($newFields) || ! empty($existingChanges)) {
                // UPDATE TABLE (Add Columns / Add Constraints)
                $migrationContent = $this->generateUpdateMigration($tableName, $newFields, $relationships, $existingChanges);
                $migrationName = date('Y_m_d_His')."_update_{$tableName}_table.php";
                File::put(database_path("migrations/{$migrationName}"), $migrationContent);
            }

            // 2. Run Migration
            Artisan::call('migrate');

            // 4. Run GenerateCrud Command (Force to update Model/Views)
            $fillableNames = [];
            foreach ($existingChanges as $col => $change) {
                if (! empty($change['fillable'])) {
                    $fillableNames[] = $col;
                }
            }
            foreach ($fields as $field) {
                if (! empty($field['fillable'])) {
                    $fillableNames[] = $field['name'];
                }
            }
            $fillableNames = array_values(array_unique($fillableNames));

            // 4. Run GenerateCrud Command (Force to update Model/Views)
            Artisan::call('make:crud', [
                'name' => $modelName,
                '--force' => true,
                '--relationships' => json_encode($relationships),
                '--components' => $components ? json_encode($components) : null,
                '--fillable' => ! empty($fillableNames) ? json_encode($fillableNames) : null,
            ]);

            $output = Artisan::output();

            return response()->json([
                'success' => true,
                'message' => "CRUD for {$modelName} ".($tableExists ? 'updated' : 'generated').' successfully!',
                'output' => $output,
            ]);
        } catch (\Exception $e) {
            Log::error('Migration generation failed: '.$e->getMessage().' | Table Name: '.$tableName.' | Fields: '.json_encode($newFields));

            return response()->json([
                'success' => false,
                'message' => 'Error: '.$e->getMessage(),
            ], 500);
        }
    }

    protected function generateCreateMigration($tableName, $fields, $relationships)
    {
        $fieldsHtml = $this->buildFieldsHtml($fields);

        // Add foreign keys from relationships for Create
        foreach ($relationships as $rel) {
            if ($rel['type'] === 'belongsTo') {
                $fk = $rel['foreign_key'];
                $refTable = $rel['related_table'];
                $relatedKey = $rel['related_key'] ?? 'id';

                if (! Str::contains($fieldsHtml, "\$table->foreignId('{$fk}')")) {
                    $constraint = $relatedKey !== 'id' ? ", '{$relatedKey}'" : '';
                    $fieldsHtml .= "            \$table->foreignId('{$fk}')->constrained('{$refTable}'{$constraint})->onDelete('cascade');\n";
                }
            }
        }

        return "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('{$tableName}', function (Blueprint \$table) {
            \$table->id();
{$fieldsHtml}            \$table->timestamps();
            \$table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('{$tableName}');
    }
};";
    }

    protected function generateUpdateMigration($tableName, $fields, $relationships = [], $existingChanges = [])
    {
        $fieldsHtml = $this->buildFieldsHtml($fields);
        $constraintsHtml = '';

        // Check for missing foreign keys in fields from new relationships
        foreach ($relationships as $rel) {
            if ($rel['type'] === 'belongsTo') {
                $fk = $rel['foreign_key'];
                $refTable = $rel['related_table'];
                $relatedKey = $rel['related_key'] ?? 'id';

                // Only add if not already in fieldsHtml AND column doesn't exist in DB
                if (! Str::contains($fieldsHtml, "\$table->foreignId('{$fk}')") && ! \Illuminate\Support\Facades\Schema::hasColumn($tableName, $fk)) {
                    $constraint = $relatedKey !== 'id' ? ", '{$relatedKey}'" : '';
                    $fieldsHtml .= "            \$table->foreignId('{$fk}')->constrained('{$refTable}'{$constraint})->onDelete('cascade');\n";

                    // Also add to fields array for down() method (dropColumn) logic if needed,
                    // but here we just need to ensure down() drops it.
                }
            }
        }

        $dropHtml = '';
        foreach ($fields as $field) {
            $dropHtml .= "            \$table->dropColumn('{$field['name']}');\n";
        }
        // Also drop FKs that we might have added?
        // For simplicity, we only drop explicitly defined fields for now,
        // or we could track the implicitly added FKs.
        // Let's stick to user-defined fields for safety in down(), or strictly what we added in up().
        // To be safe, if we added a column in up(), we should drop it in down().
        // However, extracting the names from the generated string is hard.
        // A better approach is to pass the "newly added columns" list to down().

        // Re-calculating implicit columns for down()
        foreach ($relationships as $rel) {
            if ($rel['type'] === 'belongsTo') {
                $fk = $rel['foreign_key'];
                if (! Str::contains($fieldsHtml, "\$table->foreignId('{$fk}')") && ! \Illuminate\Support\Facades\Schema::hasColumn($tableName, $fk)) {
                    $dropHtml .= "            \$table->dropColumn('{$fk}');\n";
                }
            }
        }

        // Constraints for existing columns (indexes, unique, foreign keys)
        foreach ($existingChanges as $col => $change) {
            if (! \Illuminate\Support\Facades\Schema::hasColumn($tableName, $col)) {
                continue;
            }
            if (! empty($change['index'])) {
                $constraintsHtml .= "            \$table->index('{$col}');\n";
                $dropHtml .= "            \$table->dropIndex(['{$col}']);\n";
            }
            if (! empty($change['unique'])) {
                $constraintsHtml .= "            \$table->unique('{$col}');\n";
                $dropHtml .= "            \$table->dropUnique(['{$col}']);\n";
            }
            if (! empty($change['fk']) && ! empty($change['fk']['table'])) {
                $refTable = $change['fk']['table'];
                $refCol = $change['fk']['column'] ?? 'id';
                $constraintsHtml .= "            \$table->foreign('{$col}')->references('{$refCol}')->on('{$refTable}')->onDelete('cascade');\n";
                $dropHtml .= "            \$table->dropForeign(['{$col}']);\n";
            }
        }

        return "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('{$tableName}', function (Blueprint \$table) {
{$fieldsHtml}
{$constraintsHtml}
        });
    }

    public function down(): void
    {
        Schema::table('{$tableName}', function (Blueprint \$table) {
{$dropHtml}
        });
    }
};";
    }

    protected function buildFieldsHtml($fields)
    {
        $html = '';
        foreach ($fields as $field) {
            $name = $field['name'];
            $type = $field['type'];
            $nullable = ($field['nullable'] ?? false) ? '->nullable()' : '';
            $unique = ($field['unique'] ?? false) ? '->unique()' : '';
            $default = ($field['default'] ?? '') ? "->default('{$field['default']}')" : '';

            if ($type === 'foreignId') {
                $refTable = Str::plural(str_replace('_id', '', $name));
                $html .= "            \$table->foreignId('{$name}')->constrained('{$refTable}')->onDelete('cascade');\n";
            } else {
                $html .= "            \$table->{$type}('{$name}'){$nullable}{$unique}{$default};\n";
            }
        }

        return $html;
    }

    // Deprecated but kept for safety if called elsewhere
    protected function generateMigrationContent($tableName, $fields, $relationships)
    {
        return $this->generateCreateMigration($tableName, $fields, $relationships);
    }
}
