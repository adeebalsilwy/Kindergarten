<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RegenerateModelsFromMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regenerate:models-from-migrations {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate all models from existing migrations and clean up duplicates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting regeneration of models from migrations...');

        // Get all migration files
        $migrationsPath = database_path('migrations');
        $files = File::files($migrationsPath);

        $tables = [];

        // Extract table names from create migration files
        foreach ($files as $file) {
            $filename = $file->getFilename();

            // Look for create_table migrations
            if (preg_match('/create_(.+)_table\.php$/', $filename, $matches)) {
                $tableName = $matches[1];
                $tables[] = $tableName;
            }
        }

        $this->info('Found '.count($tables).' tables from migrations');

        // Process each table
        foreach ($tables as $tableName) {
            $this->processTable($tableName);
        }

        $this->info('Model regeneration completed! 🚀');
    }

    protected function processTable($tableName)
    {
        $this->info("Processing table: {$tableName}");

        // Determine the correct model name (singular, studly case)
        $modelName = Str::studly(Str::singular($tableName));

        // Get fields from migration
        $fields = $this->getFieldsFromMigrationByTable($tableName);

        if (empty($fields)) {
            $this->warn("No specific fields found in migration for table {$tableName}. Skipping...");

            return;
        }

        $this->info('Found fields: '.implode(', ', array_keys($fields)));

        // Clean up any duplicate models for this table
        $this->cleanupDuplicateModels($modelName, $tableName);

        // Generate the model
        $this->generateModel($modelName, $tableName, $fields);
    }

    protected function getFieldsFromMigrationByTable($tableName)
    {
        $migrationsPath = database_path('migrations');
        $files = File::files($migrationsPath);

        $fields = [];
        $migrationFile = null;

        // Find the migration file for this table
        foreach ($files as $file) {
            if (str_contains($file->getFilename(), "create_{$tableName}_table")) {
                $migrationFile = $file;
                break;
            }
        }

        if (! $migrationFile) {
            return [];
        }

        $content = File::get($migrationFile->getPathname());

        // Match various field patterns in migrations
        // Pattern 1: $table->type('column')
        preg_match_all('/\$table->([a-zA-Z]+)\(\'([a-zA-Z0-9_]+)\'[^;]*\)/', $content, $simpleMatches);

        // Pattern 2: $table->type('column')->modifier()
        preg_match_all('/\$table->([a-zA-Z]+)\(\'([a-zA-Z0-9_]+)\'[^;]*\)->[a-zA-Z]+\([^)]*\)/', $content, $chainedMatches);

        // Pattern 3: Handle decimal fields specifically - $table->decimal('amount', 10, 2)
        preg_match_all('/\$table->decimal\(\'([a-zA-Z0-9_]+)\'[^;]*\)/', $content, $decimalMatches);

        // Pattern 4: Handle enum fields specifically - $table->enum('status', [...])
        preg_match_all('/\$table->enum\(\'([a-zA-Z0-9_]+)\'[^;]*\)/', $content, $enumMatches);

        // Pattern 5: Handle additional field types like double, float, etc.
        preg_match_all('/\$table->(double|float|decimal|enum|json|uuid|ipAddress|macAddress|year|timestamp|binary|geometry|linestring|point|polygon|multipoint|multilinestring|multipolygon|geometrycollection)\(\'([a-zA-Z0-9_]+)\'[^;]*\)/', $content, $additionalMatches);

        // Combine all matches
        $types = array_merge($simpleMatches[1], $chainedMatches[1]);
        $columns = array_merge($simpleMatches[2], $chainedMatches[2]);

        // Add decimal fields (they're all 'decimal' type)
        foreach ($decimalMatches[1] as $column) {
            $types[] = 'decimal';
            $columns[] = $column;
        }

        // Add enum fields (they're all 'enum' type)
        foreach ($enumMatches[1] as $column) {
            $types[] = 'enum';
            $columns[] = $column;
        }

        // Add additional field types
        foreach ($additionalMatches[1] as $index => $type) {
            $types[] = $type;
            $columns[] = $additionalMatches[2][$index];
        }

        if (! empty($types)) {
            foreach ($types as $index => $type) {
                $column = $columns[$index];
                if (! in_array($column, ['id', 'created_at', 'updated_at', 'deleted_at', 'remember_token'])) {
                    $fields[$column] = $type;
                }
            }
        }

        return $fields;
    }

    protected function cleanupDuplicateModels($correctModelName, $tableName)
    {
        $modelsPath = app_path('Models');
        $modelFiles = File::glob($modelsPath.'/*.php');

        $potentialDuplicates = [];
        foreach ($modelFiles as $file) {
            $fileName = basename($file, '.php');

            // Check if this model corresponds to the same table
            $fileTableName = Str::snake(Str::plural($fileName));
            if ($fileTableName === $tableName) {
                $potentialDuplicates[] = $fileName;
            }

            // Also check if it's a direct match with the table name
            if (strtolower($fileName) === strtolower($tableName)) {
                $potentialDuplicates[] = $fileName;
            }

            // Check if it's the singular/plural mismatch
            if (Str::snake($fileName) === $tableName || Str::snake(Str::plural($fileName)) === $tableName) {
                $potentialDuplicates[] = $fileName;
            }
        }

        // If we have duplicates (e.g., Expense and Expenses), remove the incorrect ones
        if (count($potentialDuplicates) > 1) {
            foreach ($potentialDuplicates as $duplicateModel) {
                if ($duplicateModel !== $correctModelName) {
                    $duplicatePath = app_path("Models/{$duplicateModel}.php");
                    if (File::exists($duplicatePath)) {
                        $this->info("Removing duplicate model: {$duplicateModel}.php");
                        File::delete($duplicatePath);
                    }
                }
            }
        }
    }

    protected function generateModel($modelName, $tableName, $fields)
    {
        $force = $this->option('force');

        // Prepare fillable and casts
        $fillable = $this->generateFillable($fields);
        $casts = $this->generateCasts($fields);

        // Model template
        $modelContent = "<?php\n\n";
        $modelContent .= "namespace App\Models;\n\n";
        $modelContent .= "use Illuminate\Database\Eloquent\Factories\HasFactory;\n";
        $modelContent .= "use Illuminate\Database\Eloquent\Model;\n\n";
        $modelContent .= "class {$modelName} extends Model\n";
        $modelContent .= "{\n";
        $modelContent .= "    use HasFactory;\n\n";

        // Set the table name if it's not the default
        if (Str::snake(Str::plural($modelName)) !== $tableName) {
            $modelContent .= "    protected \$table = '{$tableName}';\n\n";
        }

        $modelContent .= "    protected \$fillable = [\n";
        $modelContent .= $fillable;
        $modelContent .= "    ];\n\n";

        $modelContent .= "    protected \$casts = [\n";
        $modelContent .= $casts;
        $modelContent .= "    ];\n";
        $modelContent .= "}\n";

        $modelPath = app_path("Models/{$modelName}.php");

        if (File::exists($modelPath) && ! $force) {
            $this->warn("Model already exists: {$modelPath}. Use --force to overwrite.");

            return;
        }

        // Create directory if it doesn't exist
        $directory = dirname($modelPath);
        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        File::put($modelPath, $modelContent);
        $this->info("Generated model: {$modelPath}");
    }

    protected function generateFillable($fields)
    {
        $fillable = '';
        foreach ($fields as $field => $type) {
            $fillable .= "        '{$field}',\n";
        }

        return $fillable;
    }

    protected function generateCasts($fields)
    {
        $casts = '';
        foreach ($fields as $field => $type) {
            if ($type === 'boolean') {
                $casts .= "        '{$field}' => 'boolean',\n";
            } elseif ($type === 'date' || $type === 'dateTime' || $type === 'timestamp') {
                $casts .= "        '{$field}' => 'datetime',\n";
            } elseif ($type === 'integer' || $type === 'bigInteger') {
                $casts .= "        '{$field}' => 'integer',\n";
            } elseif ($type === 'decimal' || $type === 'float' || $type === 'double') {
                $casts .= "        '{$field}' => 'decimal:2',\n";
            } elseif ($type === 'json') {
                $casts .= "        '{$field}' => 'array',\n";
            }
        }

        return $casts;
    }
}
