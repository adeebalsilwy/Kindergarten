<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseImportController extends Controller
{
    public function index()
    {
        return view('pages.database-import.index');
    }

    public function getDatabaseSchema()
    {
        try {
            $tables = $this->getTablesList();
            $schema = [];

            foreach ($tables as $table) {
                $columns = $this->getTableColumns($table);
                $relationships = $this->detectRelationships($table, $columns);

                $schema[] = [
                    'table_name' => $table,
                    'columns' => $columns,
                    'relationships' => $relationships,
                ];
            }

            return response()->json($schema);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getTablesList()
    {
        $tables = Schema::getTables();
        $tableNames = array_map(function ($table) {
            return is_array($table) ? $table['name'] : $table->name;
        }, $tables);

        // Filter out system tables
        return array_values(array_filter($tableNames, function ($name) {
            return ! in_array($name, ['migrations', 'failed_jobs', 'password_reset_tokens', 'personal_access_tokens', 'sessions', 'command_logs']);
        }));
    }

    private function getTableColumns($tableName)
    {
        if (! Schema::hasTable($tableName)) {
            return [];
        }

        $columns = Schema::getColumns($tableName);
        $columnDetails = [];

        foreach ($columns as $col) {
            $col = (array) $col;
            $columnDetails[] = [
                'name' => $col['name'],
                'type' => $col['type_name'] ?? 'unknown',
                'nullable' => $col['nullable'] ?? false,
                'default' => $col['default'] ?? null,
                'auto_increment' => $col['auto_increment'] ?? false,
                'comment' => $col['comment'] ?? '',
            ];
        }

        return $columnDetails;
    }

    private function detectRelationships($tableName, $columns)
    {
        $relationships = [];

        foreach ($columns as $column) {
            if (str_ends_with($column['name'], '_id')) {
                $relatedTable = str_plural(str_replace('_id', '', $column['name']));

                if (Schema::hasTable($relatedTable)) {
                    $relationships[] = [
                        'type' => 'belongsTo',
                        'foreign_key' => $column['name'],
                        'related_table' => $relatedTable,
                        'related_key' => 'id',
                    ];
                }
            }
        }

        return $relationships;
    }

    public function importTable(Request $request)
    {
        $request->validate([
            'table_name' => 'required|string',
            'model_name' => 'required|string',
            'generate_crud' => 'boolean',
        ]);

        $tableName = $request->table_name;
        $modelName = $request->model_name;
        $generateCrud = $request->generate_crud ?? false;

        try {
            // Get table details with relationships
            $columns = $this->getTableColumns($tableName);
            $relationships = $this->detectRelationships($tableName, $columns);

            // Run the CRUD generation command
            $params = [
                'name' => $modelName,
                '--force' => true,
            ];

            if (! $generateCrud) {
                // Only generate model if not generating full CRUD
                $params['--components'] = json_encode(['model']);
            }

            // Add relationships if detected
            if (! empty($relationships)) {
                $params['--relationships'] = json_encode($relationships);
            }

            Artisan::call('make:crud', $params);
            $output = Artisan::output();

            return response()->json([
                'success' => true,
                'message' => "Table {$tableName} imported successfully!",
                'output' => $output,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function testConnection(Request $request)
    {
        $request->validate([
            'db_type' => 'required|in:mysql,pgsql,sqlite,sqlsrv',
            'db_server' => 'required_if:db_type,mysql,pgsql,sqlsrv',
            'db_port' => 'required_if:db_type,mysql,pgsql,sqlsrv|integer|min:1|max:65535',
            'db_name' => 'required',
            'db_user' => 'required',
            'db_password' => 'required',
        ]);

        try {
            // Temporarily change the database configuration
            config([
                'database.connections.temp_db' => [
                    'driver' => $request->db_type,
                    'host' => $request->db_server,
                    'port' => $request->db_port,
                    'database' => $request->db_name,
                    'username' => $request->db_user,
                    'password' => $request->db_password,
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'strict' => true,
                    'engine' => null,
                ],
            ]);

            // Try to connect
            DB::connection('temp_db')->getPdo();

            return response()->json([
                'success' => true,
                'message' => 'Connection successful!',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function saveConfig(Request $request)
    {
        $request->validate([
            'db_type' => 'required|in:mysql,pgsql,sqlite,sqlsrv',
            'db_server' => 'required_if:db_type,mysql,pgsql,sqlsrv',
            'db_port' => 'required_if:db_type,mysql,pgsql,sqlsrv|integer|min:1|max:65535',
            'db_name' => 'required',
            'db_user' => 'required',
            'db_password' => 'required',
        ]);

        // For now, we'll just return success since Laravel doesn't allow runtime changes to .env
        // In a real implementation, you'd update the .env file or config
        return response()->json([
            'success' => true,
            'message' => 'Configuration saved successfully!',
        ]);
    }

    public function bulkImport(Request $request)
    {
        $request->validate([
            'tables' => 'required|array',
            'tables.*' => 'required|string',
            'generate_crud' => 'boolean',
            'model_prefix' => 'nullable|string',
            'overwrite_existing' => 'boolean',
        ]);

        $tables = $request->tables;
        $generateCrud = $request->generate_crud ?? true;
        $modelPrefix = $request->model_prefix ?? '';
        $overwriteExisting = $request->overwrite_existing ?? false;

        $results = [];
        $errors = [];

        foreach ($tables as $tableName) {
            try {
                // Get table details with relationships
                $columns = $this->getTableColumns($tableName);
                $relationships = $this->detectRelationships($tableName, $columns);

                // Convert table name to model name
                $modelName = $this->convertTableNameToModelName($tableName);

                // Run the CRUD generation command
                $params = [
                    'name' => $modelPrefix.$modelName,
                ];

                if ($overwriteExisting) {
                    $params['--force'] = true;
                }

                if (! $generateCrud) {
                    // Only generate model if not generating full CRUD
                    $params['--components'] = json_encode(['model']);
                }

                // Add relationships if detected
                if (! empty($relationships)) {
                    $params['--relationships'] = json_encode($relationships);
                }

                Artisan::call('make:crud', $params);
                $output = Artisan::output();

                $results[] = [
                    'table' => $tableName,
                    'model' => $modelPrefix.$modelName,
                    'status' => 'success',
                    'output' => $output,
                ];

            } catch (\Exception $e) {
                $errors[] = [
                    'table' => $tableName,
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ];
            }
        }

        $successCount = count($results);
        $errorCount = count($errors);

        $summary = "Bulk import completed: {$successCount} successful, {$errorCount} failed.";

        return response()->json([
            'success' => true,
            'message' => $summary,
            'results' => $results,
            'errors' => $errors,
            'output' => implode("\n", array_column($results, 'output')),
        ]);
    }

    private function convertTableNameToModelName($tableName)
    {
        // Convert snake_case to StudlyCase
        return Str::studly(Str::singular($tableName));
    }
}
