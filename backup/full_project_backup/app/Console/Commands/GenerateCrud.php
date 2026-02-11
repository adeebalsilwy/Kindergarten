<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class GenerateCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name : The name of the model (e.g. Car)} {--force : Overwrite existing files} {--relationships= : JSON string of relationships} {--components= : JSON array of components to generate} {--fillable= : JSON array of fillable field names} {--skip-migration : Skip interactive migration management}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a complete CRUD (Model, Repository, Service, Controller, Views, Localization) based on migration file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $name = $this->argument('name');
            $force = $this->option('force');
            $componentsOpt = $this->option('components');
            $components = null;
            if ($componentsOpt) {
                $decoded = json_decode($componentsOpt, true);
                if (is_array($decoded)) {
                    $components = array_map(fn ($c) => strtolower(trim($c)), $decoded);
                }
            }

            $log = \App\Models\CommandLog::create([
                'command' => 'make:crud',
                'parameters' => ['name' => $name, 'force' => $force],
                'status' => 'running',
            ]);

            // Determine the correct model name based on existing models and migrations
            $modelInfo = $this->getModelInfo($name);
            $modelName = $modelInfo['modelName'];
            $tableName = $modelInfo['tableName'];
            $variableName = Str::camel($name);
            $variableNamePlural = Str::plural($variableName);
            $routePrefix = Str::kebab($tableName);
            $viewPath = Str::kebab($tableName);

            $this->info("Starting CRUD generation for {$modelName} (table: {$tableName})...");

            if (! $this->option('skip-migration')) {
                $this->manageMigration($tableName);
            }

            // 1. Find Migration File and Parse Fields
            $this->info("Parsing migration file for table: {$tableName}...");
            $fields = $this->getFieldsFromMigrationByTable($tableName);

            if (empty($fields)) {
                $this->warn("No specific fields found in migration for table {$tableName}. Using default 'name' field.");
                $fields = ['name' => 'string'];
            } else {
                $this->info('Found fields: '.implode(', ', array_keys($fields)));
            }

            // 2. Clean up any duplicate files (e.g., both singular and plural forms)
            $this->cleanupDuplicateFiles($modelName, $tableName);

            // 3. Generate Model
            $fillableOverrideOpt = $this->option('fillable');
            $fillableOverride = null;
            if ($fillableOverrideOpt) {
                $decoded = json_decode($fillableOverrideOpt, true);
                if (is_array($decoded)) {
                    $fillableOverride = array_values(array_map(fn ($f) => Str::snake($f), $decoded));
                }
            }
            if ($this->shouldGenerate('model', $components)) {
                $this->info('Generating Model...');
                $fillable = $fillableOverride ? $this->generateFillableFromNames($fillableOverride) : $this->generateFillable($fields);
                $casts = $this->generateCasts($fields);

                $relationshipResult = $this->getRelationships($tableName);
                $relationships = $relationshipResult['code'];
                $relationshipMetadata = $relationshipResult['metadata'];

                $this->generateFile(
                    base_path('stubs/model.stub'),
                    app_path("Models/{$modelName}.php"),
                    [
                        '{{modelName}}' => $modelName,
                        '{{fillable}}' => $fillable,
                        '{{casts}}' => $casts,
                        '{{relationships}}' => $relationships,
                    ],
                    $force
                );
            } else {
                // still compute relationship metadata for later steps
                $relationshipResult = $this->getRelationships($tableName);
                $relationshipMetadata = $relationshipResult['metadata'];
            }

            // 4. Repository Interface
            if ($this->shouldGenerate('repository_interface', $components)) {
                $this->info('Generating Repository Interface...');
                $this->generateFile(
                    base_path('stubs/repository.interface.stub'),
                    app_path("Repositories/Contracts/{$modelName}RepositoryInterface.php"),
                    ['{{modelName}}' => $modelName],
                    $force
                );
            }

            // 5. Repository Implementation
            if ($this->shouldGenerate('repository', $components)) {
                $this->info('Generating Repository Implementation...');
                $this->generateFile(
                    base_path('stubs/repository.eloquent.stub'),
                    app_path("Repositories/Eloquent/{$modelName}Repository.php"),
                    ['{{modelName}}' => $modelName],
                    $force
                );
            }

            // 6. Service
            if ($this->shouldGenerate('service', $components)) {
                $this->info('Generating Service...');
                $this->generateFile(
                    base_path('stubs/service.stub'),
                    app_path("Services/{$modelName}Service.php"),
                    ['{{modelName}}' => $modelName],
                    $force
                );
            }

            // 7. Form Requests
            if ($this->shouldGenerate('requests', $components)) {
                $this->info('Generating Form Requests...');
                $validationRules = $this->generateValidationRules($fields, false, $routePrefix);
                $updateValidationRules = $this->generateValidationRules($fields, true, $routePrefix);

                $this->generateFile(
                    base_path('stubs/request.store.stub'),
                    app_path("Http/Requests/Store{$modelName}Request.php"),
                    [
                        '{{modelName}}' => $modelName,
                        '{{validationRules}}' => $validationRules,
                        '{{validationAttributes}}' => $this->generateValidationAttributes($fields, $modelName),
                    ],
                    $force
                );
                $this->generateFile(
                    base_path('stubs/request.update.stub'),
                    app_path("Http/Requests/Update{$modelName}Request.php"),
                    [
                        '{{modelName}}' => $modelName,
                        '{{validationRules}}' => $updateValidationRules,
                        '{{validationAttributes}}' => $this->generateValidationAttributes($fields, $modelName),
                    ],
                    $force
                );
            }

            // 8. Controller
            if ($this->shouldGenerate('controller', $components)) {
                $this->info('Generating Controller...');

                $relationsData = '';
                foreach ($relationshipMetadata as $rel) {
                    if ($rel['type'] === 'belongsTo' || $rel['type'] === 'belongsToMany') {
                        $varName = $rel['variable_name'];
                        $modelClass = $rel['related_model'];
                        $relationsData .= "\${$varName} = \App\Models\\{$modelClass}::all();\n        ";
                    }
                }

                $this->generateFile(
                    base_path('stubs/controller.stub'),
                    app_path("Http/Controllers/{$modelName}Controller.php"),
                    [
                        '{{modelName}}' => $modelName,
                        '{{variableName}}' => $variableName,
                        '{{variableNamePlural}}' => $variableNamePlural,
                        '{{viewPath}}' => $viewPath,
                        '{{routePrefix}}' => $routePrefix,
                        '{{relationsData}}' => $relationsData,
                    ],
                    $force
                );
            }

            // 9. API resource and controller
            if ($this->shouldGenerate('api', $components)) {
                $this->info('Generating API Components...');
                $apiFields = $this->generateApiResourceFields($fields);
                $this->generateFile(
                    base_path('stubs/resource.api.stub'),
                    app_path("Http/Resources/{$modelName}Resource.php"),
                    ['{{modelName}}' => $modelName, '{{fields}}' => $apiFields],
                    $force
                );
                $this->generateFile(
                    base_path('stubs/controller.api.stub'),
                    app_path("Http/Controllers/Api/{$modelName}ApiController.php"),
                    [
                        '{{modelName}}' => $modelName,
                        '{{variableName}}' => $variableName,
                        '{{variableNamePlural}}' => $variableNamePlural,
                        '{{viewPath}}' => $viewPath,
                        '{{routePrefix}}' => $routePrefix,
                    ],
                    $force
                );
            }

            // 10. Views & Localization
            if ($this->shouldGenerate('views', $components) || $this->shouldGenerate('localization', $components)) {
                $this->info('Generating Views and Localization...');
                $viewDir = resource_path("views/pages/{$viewPath}");
                if (! File::isDirectory($viewDir)) {
                    File::makeDirectory($viewDir, 0755, true);
                }
                if ($this->shouldGenerate('localization', $components)) {
                    $this->generateLangFile($modelName, $fields);
                    $this->updateGlobalLang();
                }
                if ($this->shouldGenerate('views', $components)) {
                    $tableHeaders = $this->generateTableHeaders($fields, $modelName);
                    $tableBody = $this->generateTableBody($fields, $variableName);
                    $formFields = $this->generateFormFields($fields, $variableName, $modelName, $relationshipMetadata);
                    $exportButtons = $this->generateExportButtons($routePrefix);
                    $this->generateFile(
                        base_path('stubs/view.index.stub'),
                        "{$viewDir}/index.blade.php",
                        [
                            '{{modelName}}' => $modelName,
                            '{{variableName}}' => $variableName,
                            '{{variableNamePlural}}' => $variableNamePlural,
                            '{{routePrefix}}' => $routePrefix,
                            '{{appName}}' => config('app.name'),
                            '{{tableHeaders}}' => $tableHeaders,
                            '{{tableBody}}' => $tableBody,
                            '{{exportButtons}}' => $exportButtons,
                        ],
                        $force
                    );
                    $this->generateFile(
                        base_path('stubs/view.create.stub'),
                        "{$viewDir}/create.blade.php",
                        [
                            '{{modelName}}' => $modelName,
                            '{{variableName}}' => $variableName,
                            '{{routePrefix}}' => $routePrefix,
                            '{{appName}}' => config('app.name'),
                            '{{formFields}}' => $formFields,
                        ],
                        $force
                    );
                    $this->generateFile(
                        base_path('stubs/view.edit.stub'),
                        "{$viewDir}/edit.blade.php",
                        [
                            '{{modelName}}' => $modelName,
                            '{{variableName}}' => $variableName,
                            '{{routePrefix}}' => $routePrefix,
                            '{{appName}}' => config('app.name'),
                            '{{formFields}}' => $formFields,
                        ],
                        $force
                    );
                    $this->generateFile(
                        base_path('stubs/view.show.stub'),
                        "{$viewDir}/show.blade.php",
                        [
                            '{{modelName}}' => $modelName,
                            '{{variableName}}' => $variableName,
                            '{{routePrefix}}' => $routePrefix,
                            '{{appName}}' => config('app.name'),
                        ],
                        $force
                    );
                    $this->generateFile(
                        base_path('stubs/view.export-pdf.stub'),
                        "{$viewDir}/export-pdf.blade.php",
                        [
                            '{{modelName}}' => $modelName,
                            '{{variableName}}' => $variableName,
                            '{{routePrefix}}' => $routePrefix,
                            '{{appName}}' => config('app.name'),
                        ],
                        $force
                    );
                    $this->generateFile(
                        base_path('stubs/view.export-excel.stub'),
                        "{$viewDir}/export-excel.blade.php",
                        [
                            '{{modelName}}' => $modelName,
                            '{{variableName}}' => $variableName,
                            '{{routePrefix}}' => $routePrefix,
                            '{{appName}}' => config('app.name'),
                        ],
                        $force
                    );
                }
            }

            // 11. Web Routes
            if ($this->shouldGenerate('routes_web', $components)) {
                $this->info('Updating Routes...');
                $this->appendRoute($modelName, $routePrefix);
                $this->appendExportRoutes($modelName, $routePrefix);
            }

            // 12. Side Menu
            if ($this->shouldGenerate('side_menu', $components)) {
                $this->info('Updating Side Menu...');
                $this->updateSideMenu($modelName, $routePrefix);
            }

            // 13. API Routes
            if ($this->shouldGenerate('routes_api', $components)) {
                $this->info('Updating API Routes...');
                $this->appendApiRoute($modelName, $routePrefix);
            }

            // 14. Permissions
            if ($this->shouldGenerate('permissions', $components)) {
                $this->info('Generating Permissions...');
                $this->generatePermissions($routePrefix);
            }

            $log->update([
                'status' => 'success',
                'output' => "CRUD for {$modelName} generated successfully! 🚀",
            ]);

            $this->info("CRUD for {$modelName} generated successfully! 🚀");
        } catch (\Exception $e) {
            if (isset($log)) {
                $log->update([
                    'status' => 'failed',
                    'error_message' => $e->getMessage()."\n".$e->getTraceAsString(),
                ]);
            }
            $this->error('Error: '.$e->getMessage());
        }
    }

    protected function shouldGenerate(string $step, ?array $components): bool
    {
        if ($components === null) {
            return true;
        }

        return in_array(strtolower($step), $components, true);
    }

    protected function getRelationships($currentTable)
    {
        $result = ['code' => '', 'metadata' => []];

        // Check for passed option
        $json = $this->option('relationships');
        if ($json) {
            $rels = json_decode($json, true);
            if (is_array($rels)) {
                $relationships = '';
                $metadata = [];
                foreach ($rels as $rel) {
                    $type = $rel['type'];
                    $relatedTable = $rel['related_table'];
                    $relatedModel = Str::studly(Str::singular($relatedTable));

                    // Guess method name if not provided
                    $methodName = $rel['method_name'] ?? (($type === 'hasMany' || $type === 'belongsToMany')
                        ? Str::camel(Str::plural($relatedModel))
                        : Str::camel($relatedModel));

                    // Build Code
                    $code = "    public function {$methodName}()\n";
                    $code .= "    {\n";
                    // Handle custom keys if needed
                    $fk = $rel['foreign_key'] ?? null;
                    $relatedKey = $rel['related_key'] ?? null;

                    if ($fk && $relatedKey && $relatedKey !== 'id') {
                        $code .= "        return \$this->{$type}(\App\Models\\{$relatedModel}::class, '{$fk}', '{$relatedKey}');\n";
                    } elseif ($fk) {
                        $code .= "        return \$this->{$type}(\App\Models\\{$relatedModel}::class, '{$fk}');\n";
                    } else {
                        $code .= "        return \$this->{$type}(\App\Models\\{$relatedModel}::class);\n";
                    }

                    $code .= "    }\n\n";

                    $relationships .= $code;
                    $metadata[] = [
                        'type' => $type,
                        'method' => $methodName,
                        'related_model' => $relatedModel,
                        'related_table' => $relatedTable,
                        'variable_name' => Str::camel(Str::plural($relatedModel)),
                    ];
                }

                return ['code' => $relationships, 'metadata' => $metadata];
            }
        }

        if (! $this->confirm('Do you want to define relationships for this model?', false)) {
            return $result;
        }

        $relationships = '';
        $metadata = [];

        // Fetch all tables
        try {
            $tables = Schema::getTables();
            $tableNames = [];
            foreach ($tables as $t) {
                // Handle object or array
                $tableNames[] = is_array($t) ? $t['name'] : $t->name;
            }
        } catch (\Exception $e) {
            // Fallback for older versions or drivers
            $tables = DB::select('SHOW TABLES');
            $tableNames = [];
            foreach ($tables as $t) {
                $t = (array) $t;
                $tableNames[] = reset($t);
            }
        }

        while (true) {
            $this->info("\nAvailable Tables:");
            // Display tables in chunks or a list
            $headers = ['Index', 'Table Name'];
            $data = [];
            foreach ($tableNames as $index => $name) {
                $data[] = [$index, $name];
            }
            // Use built-in table display limited to avoid huge output if too many tables
            // But user asked to display them.
            $this->table($headers, array_slice($data, 0, 100)); // Show first 100 for now? Or all?
            // Better to show all but maybe in columns? No, standard table is fine.

            $tableIndex = $this->ask('Enter the index of the table to relate to (or "exit" to stop)');
            if ($tableIndex === 'exit') {
                break;
            }

            if (! isset($tableNames[$tableIndex])) {
                $this->error('Invalid index selected.');

                continue;
            }

            $selectedTable = $tableNames[$tableIndex];
            $this->info("Selected table: {$selectedTable}");

            // Show columns
            try {
                $columns = Schema::getColumns($selectedTable);
                $this->info("Columns in {$selectedTable}:");
                $colHeaders = ['Column Name', 'Type', 'Nullable'];
                $colData = [];
                foreach ($columns as $col) {
                    $col = (array) $col;
                    $colData[] = [
                        $col['name'],
                        $col['type_name'],
                        isset($col['nullable']) && $col['nullable'] ? 'Yes' : 'No',
                    ];
                }
                $this->table($colHeaders, $colData);
            } catch (\Exception $e) {
                $this->warn("Could not fetch columns for {$selectedTable}: ".$e->getMessage());
            }

            // Relationship Type
            $type = $this->choice(
                'Select relationship type',
                ['belongsTo', 'hasOne', 'hasMany', 'belongsToMany'],
                0
            );

            // Method Name Guess
            $relatedModel = Str::studly(Str::singular($selectedTable));
            $defaultMethod = ($type === 'hasMany' || $type === 'belongsToMany')
                ? Str::camel(Str::plural($relatedModel))
                : Str::camel($relatedModel);

            $methodName = $this->ask('Enter relationship method name', $defaultMethod);

            // Generate Code
            $code = "    public function {$methodName}()\n";
            $code .= "    {\n";
            $code .= "        return \$this->{$type}(\App\Models\\{$relatedModel}::class);\n";
            $code .= "    }\n\n";

            $relationships .= $code;

            $metadata[] = [
                'type' => $type,
                'method' => $methodName,
                'related_model' => $relatedModel,
                'related_table' => $selectedTable,
                'variable_name' => Str::camel(Str::plural($relatedModel)), // e.g. categories
            ];

            if (! $this->confirm('Add another relationship?', true)) {
                break;
            }
        }

        return ['code' => $relationships, 'metadata' => $metadata];
    }

    protected function getMigrationFile($tableName)
    {
        $migrationsPath = database_path('migrations');
        $files = File::files($migrationsPath);
        foreach ($files as $file) {
            if (str_contains($file->getFilename(), "create_{$tableName}_table")) {
                return $file->getPathname();
            }
        }

        return null;
    }

    protected function manageMigration($tableName)
    {
        $this->info("Checking migration for table: {$tableName}...");

        $migrationFile = $this->getMigrationFile($tableName);

        if (! $migrationFile) {
            if ($this->confirm("Migration for '{$tableName}' not found. Create it?", true)) {
                $this->call('make:migration', ['name' => "create_{$tableName}_table"]);
                $migrationFile = $this->getMigrationFile($tableName);
            } else {
                $this->warn('Skipping migration management.');

                return;
            }
        }

        // Read and Parse
        $content = File::get($migrationFile);
        $fields = $this->parseMigrationFields($content);

        while (true) {
            // Display current fields
            $this->info("\nCurrent Fields in Migration (id & timestamps hidden):");
            $headers = ['Name', 'Type', 'Modifiers', 'Args'];
            $data = [];
            foreach ($fields as $f) {
                $data[] = [
                    $f['name'],
                    $f['type'],
                    $f['modifiers'],
                    $f['args'],
                ];
            }
            $this->table($headers, $data);

            $choice = $this->choice('Migration Action', [
                'Add Field',
                'Edit Field',
                'Delete Field',
                'Add Relation (Foreign Key)',
                'Save & Continue',
                'Cancel (Discard Changes)',
            ], 4);

            if ($choice === 'Cancel (Discard Changes)') {
                return;
            }

            if ($choice === 'Save & Continue') {
                $this->saveMigrationFields($migrationFile, $content, $fields);
                if ($this->confirm('Run "php artisan migrate" now?', true)) {
                    $this->call('migrate');
                }

                return;
            }

            if ($choice === 'Add Field') {
                $fields[] = $this->promptField();
            }

            if ($choice === 'Edit Field') {
                $name = $this->ask('Enter field name to edit');
                $found = false;
                foreach ($fields as $k => $f) {
                    if ($f['name'] === $name) {
                        $fields[$k] = $this->promptField($f);
                        $found = true;
                        break;
                    }
                }
                if (! $found) {
                    $this->error('Field not found.');
                }
            }

            if ($choice === 'Delete Field') {
                $name = $this->ask('Enter field name to delete');
                $fields = array_filter($fields, fn ($f) => $f['name'] !== $name);
            }

            if ($choice === 'Add Relation (Foreign Key)') {
                $fields[] = $this->promptRelationField();
            }
        }
    }

    protected function parseMigrationFields($content)
    {
        $fields = [];
        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $line = trim($line);
            if (! str_starts_with($line, '$table->')) {
                continue;
            }
            if (str_contains($line, '$table->id()')) {
                continue;
            }
            if (str_contains($line, '$table->timestamps()')) {
                continue;
            }
            if (str_contains($line, '$table->rememberToken()')) {
                continue;
            }
            if (str_contains($line, '$table->softDeletes()')) {
                continue;
            }

            // Match $table->type('name', args)->modifiers;
            if (preg_match('/\$table->([a-zA-Z]+)\(\'([a-zA-Z0-9_]+)\'(?:,\s*([^)]+))?\)((?:->[a-zA-Z]+\([^)]*\))*);/', $line, $matches)) {
                $fields[] = [
                    'type' => $matches[1],
                    'name' => $matches[2],
                    'args' => $matches[3] ?? '',
                    'modifiers' => $matches[4] ?? '',
                ];
            }
            // Match foreignId
            elseif (preg_match('/\$table->foreignId\(\'([a-zA-Z0-9_]+)\'\)((?:->[a-zA-Z]+\([^)]*\))*);/', $line, $matches)) {
                $fields[] = [
                    'type' => 'foreignId',
                    'name' => $matches[1],
                    'args' => '',
                    'modifiers' => $matches[2] ?? '',
                ];
            }
        }

        return $fields;
    }

    protected function promptField($existing = null)
    {
        $name = $this->ask('Field Name', $existing['name'] ?? null);
        $type = $this->choice('Field Type', [
            'string', 'integer', 'text', 'boolean', 'date', 'datetime', 'decimal', 'float', 'json', 'longText', 'double', 'timestamp',
        ], $existing['type'] ?? 'string');

        $args = $existing['args'] ?? '';
        if ($type === 'string') {
            $length = $this->ask('Length (leave empty for default 255)', $existing['args'] ?? 255);
            $args = ($length != 255) ? $length : '';
        }

        $modifiers = $existing['modifiers'] ?? '';

        // Reset modifiers if creating new or simple edit to avoid duplication logic complexity
        if (! $existing) {
            $modifiers = '';
            if ($this->confirm('Is Nullable?', false)) {
                $modifiers .= '->nullable()';
            }
            $default = $this->ask('Default value (leave empty for none)', null);
            if ($default !== null) {
                if (is_numeric($default)) {
                    $modifiers .= "->default({$default})";
                } else {
                    $modifiers .= "->default('{$default}')";
                }
            }
        } else {
            // Simple modifier editor
            if ($this->confirm('Reset modifiers (nullable, default, etc)?', false)) {
                $modifiers = '';
                if ($this->confirm('Is Nullable?', false)) {
                    $modifiers .= '->nullable()';
                }
                $default = $this->ask('Default value (leave empty for none)', null);
                if ($default !== null) {
                    if (is_numeric($default)) {
                        $modifiers .= "->default({$default})";
                    } else {
                        $modifiers .= "->default('{$default}')";
                    }
                }
            }
        }

        return [
            'name' => $name,
            'type' => $type,
            'args' => $args,
            'modifiers' => $modifiers,
        ];
    }

    protected function promptRelationField()
    {
        try {
            $tables = Schema::getTables();
            $tableNames = [];
            foreach ($tables as $t) {
                $tableNames[] = is_array($t) ? $t['name'] : $t->name;
            }
        } catch (\Exception $e) {
            $tables = DB::select('SHOW TABLES');
            $tableNames = array_map(fn ($t) => reset($t), $tables);
        }

        $relatedTable = $this->choice('Select Related Table', $tableNames);
        $fieldName = Str::snake(Str::singular($relatedTable)).'_id';
        $fieldName = $this->ask('Foreign Key Column Name', $fieldName);

        return [
            'name' => $fieldName,
            'type' => 'foreignId',
            'args' => '',
            'modifiers' => "->constrained('{$relatedTable}')->cascadeOnDelete()",
        ];
    }

    protected function saveMigrationFields($path, $originalContent, $fields)
    {
        $lines = explode("\n", $originalContent);
        $newLines = [];
        $insideSchema = false;

        // Find indentation
        $indent = '            ';

        foreach ($lines as $line) {
            if (str_contains($line, 'Schema::create')) {
                $insideSchema = true;
                $newLines[] = $line;

                continue;
            }

            if ($insideSchema && str_contains($line, '});')) {
                $insideSchema = false;
                // Write all fields before closing
                foreach ($fields as $f) {
                    $args = $f['args'] ? ", {$f['args']}" : '';
                    if ($f['type'] === 'foreignId') {
                        $newLines[] = "{$indent}\$table->foreignId('{$f['name']}'){$f['modifiers']};";
                    } else {
                        $newLines[] = "{$indent}\$table->{$f['type']}('{$f['name']}'{$args}){$f['modifiers']};";
                    }
                }
                $newLines[] = $line; // });

                continue;
            }

            if ($insideSchema) {
                // Keep id and timestamps, discard others
                if (str_contains($line, '$table->id()') || str_contains($line, '$table->timestamps()') || str_contains($line, '$table->rememberToken()')) {
                    $newLines[] = $line;
                }

                continue;
            }

            $newLines[] = $line;
        }

        File::put($path, implode("\n", $newLines));
    }

    protected function generatePermissions($routePrefix)
    {
        $permissions = [
            "view_{$routePrefix}",
            "create_{$routePrefix}",
            "edit_{$routePrefix}",
            "delete_{$routePrefix}",
            "export_{$routePrefix}",
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $this->info("Permissions generated for {$routePrefix}");
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

    protected function getModelInfo($inputName)
    {
        // Handle reserved words
        $reservedWords = ['Class', 'classes', 'interface', 'trait', 'abstract', 'Parent', 'parent', 'parents'];
        if (in_array(strtolower($inputName), array_map('strtolower', $reservedWords))) {
            if (strtolower($inputName) === 'class' || strtolower($inputName) === 'classes') {
                $inputName = 'Classes';
            } elseif (strtolower($inputName) === 'parent' || strtolower($inputName) === 'parents') {
                $inputName = 'Guardian';
            }
        }

        // First, try to find the table name from migrations based on input
        $possibleTableNames = [
            Str::snake(Str::plural($inputName)), // e.g., expenses for Expense
            Str::snake($inputName),             // e.g., expense for Expense
        ];

        $migrationsPath = database_path('migrations');
        $files = File::files($migrationsPath);

        $foundTableName = null;

        foreach ($possibleTableNames as $tableName) {
            foreach ($files as $file) {
                if (str_contains($file->getFilename(), "create_{$tableName}_table")) {
                    $foundTableName = $tableName;
                    break 2; // break both loops
                }
            }
        }

        if (! $foundTableName) {
            // If not found in migrations, use the plural snake case as fallback
            $foundTableName = Str::snake(Str::plural($inputName));
        }

        // Determine the correct model name based on common Laravel conventions
        $modelName = Str::studly($inputName);
        if ($modelName !== 'Classes') {
            $modelName = Str::studly(Str::singular(Str::plural($inputName)));
        }
        if (strtolower($modelName) === 'parent') {
            $modelName = 'Guardian';
        }

        return [
            'modelName' => $modelName,
            'tableName' => $foundTableName,
        ];
    }

    protected function cleanupDuplicateFiles($correctModelName, $tableName)
    {
        $singularName = Str::studly(Str::singular($correctModelName));
        $pluralName = Str::studly(Str::plural($correctModelName));

        $namesToCheck = array_unique([$singularName, $pluralName]);

        foreach ($namesToCheck as $name) {
            if ($name === $correctModelName) {
                continue;
            }

            $this->info("Cleaning up redundant files for: {$name}");

            // Models
            $this->deleteFile(app_path("Models/{$name}.php"));

            // Controllers
            $this->deleteFile(app_path("Http/Controllers/{$name}Controller.php"));

            // Services
            $this->deleteFile(app_path("Services/{$name}Service.php"));

            // Repositories
            $this->deleteFile(app_path("Repositories/Eloquent/{$name}Repository.php"));
            $this->deleteFile(app_path("Repositories/Contracts/{$name}RepositoryInterface.php"));

            // Requests
            $this->deleteFile(app_path("Http/Requests/Store{$name}Request.php"));
            $this->deleteFile(app_path("Http/Requests/Update{$name}Request.php"));

            // Lang files
            $kebabName = Str::kebab(Str::plural($name));
            $this->deleteFile(base_path("lang/en/{$kebabName}.php"));
            $this->deleteFile(base_path("lang/ar/{$kebabName}.php"));
        }

        // Specifically for "Class" reserved word
        if ($correctModelName === 'Classes') {
            $this->info("Cleaning up broken 'Class' files...");
            $this->deleteFile(app_path('Http/Controllers/ClassController.php'));
            $this->deleteFile(app_path('Services/ClassService.php'));
            $this->deleteFile(app_path('Repositories/Eloquent/ClassRepository.php'));
            $this->deleteFile(app_path('Repositories/Contracts/ClassRepositoryInterface.php'));
            $this->deleteFile(app_path('Http/Requests/StoreClassRequest.php'));
            $this->deleteFile(app_path('Http/Requests/UpdateClassRequest.php'));
        }
    }

    protected function deleteFile($path)
    {
        if (File::exists($path)) {
            $this->info('Deleting: '.str_replace(base_path(), '', $path));
            File::delete($path);
        }
    }

    protected function generateFillable($fields)
    {
        $fillable = '';
        foreach ($fields as $field => $type) {
            $fillable .= "        '{$field}',\n";
        }

        return $fillable;
    }

    protected function generateFillableFromNames($names)
    {
        $fillable = '';
        foreach ($names as $field) {
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

    protected function generateValidationRules($fields, $isUpdate = false, $routePrefix = '')
    {
        $rules = '';
        foreach ($fields as $field => $type) {
            $rule = $this->getFieldValidationRule($field, $type, $isUpdate, $routePrefix);
            $rules .= "            '{$field}' => '{$rule}',\n";
        }

        return $rules;
    }

    protected function getFieldValidationRule($field, $type, $isUpdate, $routePrefix)
    {
        $rule = 'required';

        // Type based rules
        if ($type === 'string') {
            $rule .= '|string|max:255';
        }
        if ($type === 'integer' || $type === 'bigInteger') {
            $rule .= '|integer';
        }
        if ($type === 'boolean') {
            $rule .= '|boolean';
        }
        if ($type === 'date') {
            $rule .= '|date';
        }
        if ($type === 'dateTime' || $type === 'timestamp') {
            $rule .= '|date';
        }
        if ($type === 'email') {
            $rule .= '|email';
        }
        if ($type === 'decimal' || $type === 'float' || $type === 'double') {
            $rule .= '|numeric';
        }
        if ($type === 'enum') {
            // Get actual enum values from migration
            $tableName = Str::snake($routePrefix); // Use routePrefix as table name
            $enumValues = $this->getEnumValuesFromMigration($tableName, $field);
            $rule .= "|in:{$enumValues}";
        }
        if ($type === 'json') {
            $rule .= '|json';
        }
        if ($type === 'text' || $type === 'longText') {
            $rule = 'nullable|string';
        }

        // Special field validations
        if ($field === 'email') {
            $rule = 'required|email|unique:'.Str::snake(Str::plural($routePrefix)).',email';
        }
        if ($field === 'password') {
            $rule = $isUpdate ? 'nullable|string|min:6' : 'required|string|min:6';
        }

        // Unique check guess
        if ($field === 'email' || $field === 'code' || $field === 'slug' || $field === 'username') {
            if ($isUpdate) {
                // Unique ignore current
                // Assuming route parameter name matches singular route prefix.
                // e.g. languages -> language
                $paramName = Str::singular($routePrefix);
                $rule .= '|unique:'.Str::snake(Str::plural($routePrefix)).",{$field},' . \$this->route('{$paramName}') . '";
            } else {
                $rule .= '|unique:'.Str::snake(Str::plural($routePrefix)).",{$field}";
            }
        }

        // Conditional rule for update (make required fields optional on update)
        if ($isUpdate && ! in_array($field, ['email', 'password'])) {
            $rule = str_replace('required', 'nullable', $rule);
        }

        return $rule;
    }

    protected function extractEnumValues($field, $type)
    {
        // This method should be called with the migration content to extract actual enum values
        // For now, return a placeholder - in a full implementation, we'd parse the migration file
        return 'option1,option2,option3';
    }

    protected function getEnumValuesFromMigration($tableName, $fieldName)
    {
        $migrationsPath = database_path('migrations');
        $files = File::files($migrationsPath);

        foreach ($files as $file) {
            if (str_contains($file->getFilename(), "create_{$tableName}_table")) {
                $content = File::get($file->getPathname());

                // Look for the specific enum field definition
                $pattern = '/\$table->enum\(\''.preg_quote($fieldName).'\'[^;]*\)/';
                if (preg_match($pattern, $content, $matches)) {
                    // Extract the array of values from the enum definition
                    $enumMatch = $matches[0];

                    // Find the array inside the parentheses
                    if (preg_match('/\[([^\]]+)\]/', $enumMatch, $arrayMatches)) {
                        $valuesString = $arrayMatches[1];

                        // Extract individual values
                        preg_match_all('/[\'"]([^\'"]+)[\'"]/', $valuesString, $valueMatches);

                        if (! empty($valueMatches[1])) {
                            return implode(',', $valueMatches[1]);
                        }
                    }
                }
            }
        }

        // If not found, return a default set
        return 'pending,approved,paid,rejected'; // Common default values
    }

    protected function generateExportButtons($routePrefix)
    {
        return "
                        <div class=\"flex gap-2\">
                            <x-base.button variant=\"outline-primary\" as=\"a\" href=\"{{ route('{$routePrefix}.export.pdf') }}\" class=\"flex items-center\">
                                <x-base.lucide icon=\"FileText\" class=\"w-4 h-4 mr-2\" />
                                {{ __('global.export_pdf') }}
                            </x-base.button>
                            <x-base.button variant=\"outline-success\" as=\"a\" href=\"{{ route('{$routePrefix}.export.excel') }}\" class=\"flex items-center\">
                                <x-base.lucide icon=\"FileSpreadsheet\" class=\"w-4 h-4 mr-2\" />
                                {{ __('global.export_excel') }}
                            </x-base.button>
                        </div>";
    }

    protected function generateTableHeaders($fields, $modelName)
    {
        $headers = '';
        $kebabName = Str::kebab(Str::plural($modelName));
        foreach ($fields as $field => $type) {
            if ($type === 'text' || $type === 'longText') {
                continue;
            } // Skip long fields in table
            $headers .= "                            <x-base.table.th class=\"whitespace-nowrap text-center\">{{ __('{$kebabName}.fields.{$field}') }}</x-base.table.th>\n";
        }

        return $headers;
    }

    protected function generateTableBody($fields, $variableName)
    {
        $body = '';
        foreach ($fields as $field => $type) {
            if ($type === 'text' || $type === 'longText') {
                continue;
            }

            if ($type === 'boolean') {
                $body .= "                            <x-base.table.td class=\"text-center\">\n";
                $body .= "                                <div class=\"flex items-center justify-center {{ \${$variableName}->{$field} ? 'text-success' : 'text-danger' }}\">";
                $body .= " <x-base.lucide icon=\"{{ \${$variableName}->{$field} ? 'CheckSquare' : 'XSquare' }}\" class=\"w-4 h-4 mr-2\" /> {{ \${$variableName}->{$field} ? __('global.yes') : __('global.no') }} </div>\n";
                $body .= "                            </x-base.table.td>\n";
            } elseif ($type === 'date' || $type === 'dateTime' || $type === 'timestamp') {
                $body .= "                            <x-base.table.td class=\"text-center\">{{ \${$variableName}->{$field}->format('Y-m-d') }}</x-base.table.td>\n";
            } else {
                $body .= "                            <x-base.table.td class=\"text-center\">{{ \${$variableName}->{$field} }}</x-base.table.td>\n";
            }
        }

        return $body;
    }

    protected function generateFormFields($fields, $variableName, $modelName, $relationshipMetadata = [])
    {
        $html = '';
        $kebabName = Str::kebab(Str::plural($modelName));

        foreach ($fields as $field => $type) {
            $labelKey = "{$kebabName}.fields.{$field}";

            // Check if this field is a foreign key in relationships
            $relatedVar = null;
            $relatedModel = null;

            foreach ($relationshipMetadata as $rel) {
                // Assuming convention: method name "category" -> foreign key "category_id"
                // Or "user" -> "user_id"
                // Or maybe check if field matches foreign key logic
                $guessForeignKey = Str::snake($rel['method']).'_id';

                if ($rel['type'] === 'belongsTo' && ($field === $guessForeignKey || $field === Str::foreignKey($rel['related_model']))) {
                    $relatedVar = $rel['variable_name'];
                    $relatedModel = $rel['related_model'];
                    break;
                }
            }

            if ($relatedVar) {
                // Generate Select for Relation using TomSelect component
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <x-base.tom-select name=\"{$field}\" class=\"mt-2\">\n";
                $html .= "                                <option value=\"\">{{ __('global.select_option') }}</option>\n";
                $html .= "                                @foreach(\${$relatedVar} as \$item)\n";
                // Assuming 'name' or 'title' exists, fallback to 'id'
                $html .= "                                    <option value=\"{{ \$item->id }}\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == \$item->id ? 'selected' : '' }}>{{ \$item->name ?? \$item->title ?? \$item->id }}</option>\n";
                $html .= "                                @endforeach\n";
                $html .= "                            </x-base.tom-select>\n";
                $html .= "                        </div>\n";

                continue;
            }

            // Handle special field types
            if ($field === 'amount' || $field === 'fees_required' || $field === 'fees_paid' || $field === 'price' || $field === 'cost' || $field === 'salary' || $field === 'balance') {
                // Monetary fields
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"relative mt-2\">\n";
                $html .= "                                <div class=\"absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none\">\n";
                $html .= "                                    <span class=\"text-gray-500 sm:text-sm\">{{ config('app.currency', 'USD') }}</span>\n";
                $html .= "                                </div>\n";
                $html .= "                                <x-base.form-input type=\"number\" step=\"0.01\" min=\"0\" name=\"{$field}\" value=\"{{ old('{$field}', \${$variableName}->{$field} ?? '') }}\" class=\"pl-12\" />\n";
                $html .= "                            </div>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'date_of_birth' || $field === 'dob' || $field === 'start_date' || $field === 'end_date' || $field === 'payment_date' || $field === 'created_at' || $field === 'updated_at') {
                // Date fields
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"relative mt-2\">\n";
                $html .= "                                <x-base.form-input type=\"date\" name=\"{$field}\" value=\"{{ old('{$field}', \${$variableName}->{$field} ?? '') }}\" />\n";
                $html .= "                                <div class=\"absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none\">\n";
                $html .= "                                    <x-base.lucide icon=\"Calendar\" class=\"h-5 w-5 text-gray-400\" />\n";
                $html .= "                                </div>\n";
                $html .= "                            </div>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'check_in_time' || $field === 'check_out_time' || $field === 'start_time' || $field === 'end_time') {
                // Time fields
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"relative mt-2\">\n";
                $html .= "                                <x-base.form-input type=\"time\" name=\"{$field}\" value=\"{{ old('{$field}', \${$variableName}->{$field} ?? '') }}\" />\n";
                $html .= "                                <div class=\"absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none\">\n";
                $html .= "                                    <x-base.lucide icon=\"Clock\" class=\"h-5 w-5 text-gray-400\" />\n";
                $html .= "                                </div>\n";
                $html .= "                            </div>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'email') {
                // Email fields
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"relative mt-2\">\n";
                $html .= "                                <x-base.form-input type=\"email\" name=\"{$field}\" value=\"{{ old('{$field}', \${$variableName}->{$field} ?? '') }}\" />\n";
                $html .= "                                <div class=\"absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none\">\n";
                $html .= "                                    <x-base.lucide icon=\"Mail\" class=\"h-5 w-5 text-gray-400\" />\n";
                $html .= "                                </div>\n";
                $html .= "                            </div>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'phone' || $field === 'mobile') {
                // Phone fields
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"relative mt-2\">\n";
                $html .= "                                <x-base.form-input type=\"tel\" name=\"{$field}\" value=\"{{ old('{$field}', \${$variableName}->{$field} ?? '') }}\" />\n";
                $html .= "                                <div class=\"absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none\">\n";
                $html .= "                                    <x-base.lucide icon=\"Phone\" class=\"h-5 w-5 text-gray-400\" />\n";
                $html .= "                                </div>\n";
                $html .= "                            </div>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'photo_path' || $field === 'image_path' || $field === 'avatar' || $field === 'profile_image') {
                // File upload fields
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"mt-2 flex items-center\">\n";
                $html .= "                                <x-base.form-input type=\"file\" name=\"{$field}\" accept=\"image/*\" class=\"block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90\" />\n";
                $html .= "                            </div>\n";
                $html .= "                            @if(\${$variableName}->{$field})\n";
                $html .= "                                <div class=\"mt-2 flex items-center\">\n";
                $html .= "                                    <img src=\"{{ asset('storage/' . \${$variableName}->{$field}) }}\" alt=\"Current Photo\" class=\"w-16 h-16 object-cover rounded border-2 border-gray-200\">\n";
                $html .= "                                    <span class=\"ml-3 text-sm text-gray-500\">{{ __('global.current_image') }}</span>\n";
                $html .= "                                </div>\n";
                $html .= "                            @endif\n";
                $html .= "                        </div>\n";

            } elseif ($type === 'text' || $type === 'longText' || $type === 'mediumText') {
                $html .= "                        <div class=\"col-span-12\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <x-base.form-textarea name=\"{$field}\" rows=\"4\" class=\"resize-none\">{{ old('{$field}', \${$variableName}->{$field} ?? '') }}</x-base.form-textarea>\n";
                $html .= "                        </div>\n";

            } elseif ($type === 'boolean') {
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <div class=\"mt-2 space-y-2\">\n";
                $html .= "                                <!-- Hidden input to send 0 if unchecked -->\n";
                $html .= "                                <input type=\"hidden\" name=\"{$field}\" value=\"0\">\n";
                $html .= "                                <label class=\"relative inline-flex items-center cursor-pointer\">\n";
                $html .= "                                    <x-base.form-input type=\"checkbox\" name=\"{$field}\" value=\"1\" {{ old('{$field}', \${$variableName}->{$field} ?? false) ? 'checked' : '' }} class=\"sr-only peer\" />\n";
                $html .= "                                    <div class=\"w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary\"></div>\n";
                $html .= "                                    <span class=\"ml-3 text-sm font-medium text-gray-900 dark:text-gray-300\">{{ __('global.active') }}</span>\n";
                $html .= "                                </label>\n";
                $html .= "                            </div>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'gender') {
                // Gender dropdown using TomSelect
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <x-base.tom-select name=\"{$field}\" class=\"mt-2\">\n";
                $html .= "                                <option value=\"\">{{ __('global.select_option') }}</option>\n";
                $html .= "                                <option value=\"male\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'male' ? 'selected' : '' }}>{{ __('global.male') }}</option>\n";
                $html .= "                                <option value=\"female\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'female' ? 'selected' : '' }}>{{ __('global.female') }}</option>\n";
                $html .= "                            </x-base.tom-select>\n";
                $html .= "                        </div>\n";

            } elseif ($field === 'status') {
                // Status dropdown with common options using TomSelect
                $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                $html .= "                            <x-base.tom-select name=\"{$field}\" class=\"mt-2\">\n";
                $html .= "                                <option value=\"\">{{ __('global.select_option') }}</option>\n";
                $html .= "                                <option value=\"active\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'active' ? 'selected' : '' }}>{{ __('global.active') }}</option>\n";
                $html .= "                                <option value=\"inactive\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'inactive' ? 'selected' : '' }}>{{ __('global.inactive') }}</option>\n";
                $html .= "                                <option value=\"pending\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'pending' ? 'selected' : '' }}>{{ __('global.pending') }}</option>\n";
                $html .= "                                <option value=\"draft\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'draft' ? 'selected' : '' }}>{{ __('global.draft') }}</option>\n";
                $html .= "                            </x-base.tom-select>\n";
                $html .= "                        </div>\n";

            } else {
                $inputType = ($type === 'date') ? 'date' : (($type === 'dateTime' || $type === 'timestamp') ? 'datetime-local' : (($type === 'integer' || $type === 'decimal' || $type === 'float' || $type === 'double' || $type === 'bigInteger') ? 'number' : 'text'));
                $step = ($type === 'decimal' || $type === 'float' || $type === 'double') ? ' step="0.01"' : '';
                $min = (strpos($field, 'age') !== false || strpos($field, 'quantity') !== false) ? ' min="0"' : '';

                if ($type === 'enum') {
                    // Generate dropdown for enum fields using TomSelect
                    $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                    $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                    $html .= "                            <x-base.tom-select name=\"{$field}\" class=\"mt-2\">\n";
                    $html .= "                                <option value=\"\">{{ __('global.select_option') }}</option>\n";
                    // This is a simplified approach - in a real scenario, we'd need to parse the actual enum values
                    $html .= "                                <option value=\"option1\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'option1' ? 'selected' : '' }}>Option 1</option>\n";
                    $html .= "                                <option value=\"option2\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'option2' ? 'selected' : '' }}>Option 2</option>\n";
                    $html .= "                                <option value=\"option3\" {{ old('{$field}', \${$variableName}->{$field} ?? '') == 'option3' ? 'selected' : '' }}>Option 3</option>\n";
                    $html .= "                            </x-base.tom-select>\n";
                    $html .= "                        </div>\n";
                } elseif ($type === 'json' || $type === 'text' || $type === 'longText' || $type === 'mediumText') {
                    $html .= "                        <div class=\"col-span-12\">\n";
                    $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                    $html .= "                            <x-base.form-textarea name=\"{$field}\" rows=\"4\" class=\"resize-none\">{{ old('{$field}', \${$variableName}->{$field} ?? '') }}</x-base.form-textarea>\n";
                    $html .= "                        </div>\n";
                } else {
                    $html .= "                        <div class=\"col-span-12 sm:col-span-6\">\n";
                    $html .= "                            <x-base.form-label>{{ __('{$labelKey}') }}</x-base.form-label>\n";
                    $html .= "                            <x-base.form-input type=\"{$inputType}\"{$step}{$min} name=\"{$field}\" value=\"{{ old('{$field}', \${$variableName}->{$field} ?? '') }}\" class=\"mt-2\" />\n";
                    $html .= "                        </div>\n";
                }
            }
        }

        return $html;
    }

    protected function generateLangFile($modelName, $fields)
    {
        $kebabName = Str::kebab(Str::plural($modelName));
        $humanName = Str::plural(Str::headline($modelName));

        // Generate English localization
        $enLangContent = "<?php\n\nreturn [\n";
        $enLangContent .= "    'title' => '{$humanName}',\n";
        $enLangContent .= "    'add_new' => 'Add New ".Str::headline($modelName)."',\n";
        $enLangContent .= "    'edit' => 'Edit ".Str::headline($modelName)."',\n";
        $enLangContent .= "    'list' => '{$humanName} List',\n";
        $enLangContent .= "    'fields' => [\n";
        foreach ($fields as $field => $type) {
            $enLangContent .= "        '{$field}' => '".Str::headline($field)."',\n";
        }
        $enLangContent .= "    ],\n";
        $enLangContent .= "    'actions' => [\n";
        $enLangContent .= "        'save' => 'Save',\n";
        $enLangContent .= "        'cancel' => 'Cancel',\n";
        $enLangContent .= "        'update' => 'Update',\n";
        $enLangContent .= "        'edit' => 'Edit',\n";
        $enLangContent .= "        'delete' => 'Delete',\n";
        $enLangContent .= "        'confirm_delete' => 'Are you sure?',\n";
        $enLangContent .= "    ],\n";
        $enLangContent .= "    'messages' => [\n";
        $enLangContent .= "        'created' => 'Record created successfully.',\n";
        $enLangContent .= "        'updated' => 'Record updated successfully.',\n";
        $enLangContent .= "        'deleted' => 'Record deleted successfully.',\n";
        $enLangContent .= "    ],\n";
        $enLangContent .= "];\n";

        // Generate Arabic localization with proper translations
        $arLangContent = "<?php\n\nreturn [\n";
        $arLangContent .= "    'title' => '".$this->translateToArabic($humanName)."',\n";
        $arLangContent .= "    'add_new' => 'إضافة ".$this->translateToArabic(Str::headline($modelName))." جديد',\n";
        $arLangContent .= "    'edit' => 'تعديل ".$this->translateToArabic(Str::headline($modelName))."',\n";
        $arLangContent .= "    'list' => 'قائمة ".$this->translateToArabic($humanName)."',\n";
        $arLangContent .= "    'fields' => [\n";
        foreach ($fields as $field => $type) {
            $arLangContent .= "        '{$field}' => '".$this->translateFieldToArabic($field)."',\n";
        }
        $arLangContent .= "    ],\n";
        $arLangContent .= "    'actions' => [\n";
        $arLangContent .= "        'save' => 'حفظ',\n";
        $arLangContent .= "        'cancel' => 'إلغاء',\n";
        $arLangContent .= "        'update' => 'تحديث',\n";
        $arLangContent .= "        'edit' => 'تعديل',\n";
        $arLangContent .= "        'delete' => 'حذف',\n";
        $arLangContent .= "        'confirm_delete' => 'هل أنت متأكد؟',\n";
        $arLangContent .= "    ],\n";
        $arLangContent .= "    'messages' => [\n";
        $arLangContent .= "        'created' => 'تم إنشاء السجل بنجاح.',\n";
        $arLangContent .= "        'updated' => 'تم تحديث السجل بنجاح.',\n";
        $arLangContent .= "        'deleted' => 'تم حذف السجل بنجاح.',\n";
        $arLangContent .= "    ],\n";
        $arLangContent .= "];\n";

        // Create for EN
        $path = base_path("lang/en/{$kebabName}.php");
        if (! File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }
        File::put($path, $enLangContent);

        // Create for AR
        $pathAr = base_path("lang/ar/{$kebabName}.php");
        if (! File::isDirectory(dirname($pathAr))) {
            File::makeDirectory(dirname($pathAr), 0755, true);
        }
        File::put($pathAr, $arLangContent);
    }

    protected function translateToArabic($text)
    {
        $translations = [
            'Languages' => 'اللغات',
            'Language' => 'اللغة',
            'Users' => 'المستخدمون',
            'User' => 'المستخدم',
            'Posts' => 'المشاركات',
            'Post' => 'المشاركة',
            'Categories' => 'الفئات',
            'Category' => 'الفئة',
            'Products' => 'المنتجات',
            'Product' => 'المنتج',
        ];

        return $translations[$text] ?? $text;
    }

    protected function translateFieldToArabic($field)
    {
        $translations = [
            'name' => 'الاسم',
            'code' => 'الرمز',
            'title' => 'العنوان',
            'description' => 'الوصف',
            'email' => 'البريد الإلكتروني',
            'phone' => 'الهاتف',
            'mobile' => 'الجوال',
            'address' => 'العنوان',
            'status' => 'الحالة',
            'is_active' => 'نشط',
            'is_rtl' => 'من اليمين إلى اليسار',
            'gender' => 'الجنس',
            'birth_date' => 'تاريخ الميلاد',
            'start_date' => 'تاريخ البدء',
            'end_date' => 'تاريخ الانتهاء',
            'amount' => 'المبلغ',
            'price' => 'السعر',
            'cost' => 'التكلفة',
            'notes' => 'ملاحظات',
            'image_path' => 'الصورة',
            'photo_path' => 'الصورة',
            'created_at' => 'تاريخ الإنشاء',
            'updated_at' => 'تاريخ التحديث',
        ];

        return $translations[$field] ?? Str::headline($field);
    }

    protected function updateGlobalLang()
    {
        // Update English global language file
        $enPath = base_path('lang/en/global.php');
        $enContent = File::exists($enPath) ? File::get($enPath) : "<?php\nreturn [\n];";

        // Add missing keys if they don't exist
        if (! str_contains($enContent, "'export_pdf'")) {
            $enContent = str_replace('];', "    'export_pdf' => 'Export PDF',\n    'export_excel' => 'Export Excel',\n    'current_image' => 'Current Image',\n];", $enContent);
        }

        File::put($enPath, $enContent);

        // Update Arabic global language file
        $arPath = base_path('lang/ar/global.php');
        $arContent = File::exists($arPath) ? File::get($arPath) : "<?php\nreturn [\n];";

        // Add missing keys if they don't exist
        if (! str_contains($arContent, "'export_pdf'")) {
            $arContent = str_replace('];', "    'export_pdf' => 'تصدير PDF',\n    'export_excel' => 'تصدير Excel',\n    'current_image' => 'الصورة الحالية',\n];", $arContent);
        }

        File::put($arPath, $arContent);
    }

    protected function generateFile($stubPath, $targetPath, $replacements, $force = false)
    {
        if (File::exists($targetPath) && ! $force) {
            $this->warn("File already exists: {$targetPath}. Use --force to overwrite.");

            return;
        }

        $content = File::get($stubPath);
        foreach ($replacements as $key => $value) {
            $content = str_replace($key, $value, $content);
        }

        $directory = dirname($targetPath);
        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        File::put($targetPath, $content);
    }

    protected function appendExportRoutes($modelName, $routePrefix)
    {
        $routeFile = base_path('routes/web.php');
        $controllerName = "{$modelName}Controller";
        $content = File::get($routeFile);

        // Add export routes if they don't exist
        $exportRoutes = "
// Export Routes for {$modelName}
Route::get('{$routePrefix}/export/pdf', [{$controllerName}::class, 'exportPdf'])->name('{$routePrefix}.export.pdf')->middleware('auth');
Route::get('{$routePrefix}/export/excel', [{$controllerName}::class, 'exportExcel'])->name('{$routePrefix}.export.excel')->middleware('auth');";

        if (! str_contains($content, "Route::get('{$routePrefix}/export/pdf'")) {
            // Insert before the closing PHP tag or at the end
            if (str_contains($content, '// CRUD Resource Routes')) {
                $content = str_replace('// CRUD Resource Routes', "// CRUD Resource Routes\n".$exportRoutes, $content);
            } else {
                $content .= "\n".$exportRoutes;
            }
            File::put($routeFile, $content);
        }
    }

    protected function appendRoute($modelName, $routePrefix)
    {
        $routeFile = base_path('routes/web.php');
        $controllerName = "{$modelName}Controller";

        $content = File::get($routeFile);

        // Add Import if not exists
        if (! str_contains($content, "use App\Http\Controllers\\{$controllerName};")) {
            // Find the last "use " statement to append after
            if (preg_match('/^use .+;$/m', $content, $matches, PREG_OFFSET_CAPTURE, strrpos($content, 'use '))) {
                $pos = $matches[0][1] + strlen($matches[0][0]);
                $content = substr_replace($content, "\nuse App\Http\Controllers\\{$controllerName};", $pos, 0);
            } else {
                $content = str_replace('<?php', "<?php\n\nuse App\Http\Controllers\\{$controllerName};", $content);
            }
        }

        // Add Route if not exists
        if (! str_contains($content, "Route::resource('{$routePrefix}'")) {
            $routeLine = "Route::resource('{$routePrefix}', {$controllerName}::class)->middleware('auth');";

            if (str_contains($content, '// CRUD Resource Routes')) {
                $content = str_replace('// CRUD Resource Routes', "// CRUD Resource Routes\n".$routeLine, $content);
            } elseif (str_contains($content, 'Route::fallback')) {
                $content = str_replace('Route::fallback', $routeLine."\n\nRoute::fallback", $content);
            } else {
                $content .= "\n".$routeLine;
            }
            File::put($routeFile, $content);
        }
    }

    protected function updateSideMenu($modelName, $routePrefix)
    {
        $menuFile = app_path('Main/SideMenu.php');
        $content = File::get($menuFile);
        $kebabName = Str::kebab(Str::plural($modelName));

        // Check if already exists
        if (str_contains($content, "'route_name' => '{$routePrefix}.index'")) {
            return;
        }

        $newItem = "
            '{$routePrefix}' => [
                'icon' => 'box',
                'route_name' => '{$routePrefix}.index',
                'title' => __('{$kebabName}.title') 
            ],";

        // Insert before the last closing bracket of the returned array
        $pos = strrpos($content, '];');
        if ($pos !== false) {
            $content = substr_replace($content, $newItem."\n        ];", $pos, 2);
            File::put($menuFile, $content);
        }
    }

    protected function generateApiResourceFields($fields)
    {
        $output = '';
        foreach ($fields as $field => $type) {
            $output .= "            '{$field}' => \$this->{$field},\n";
        }

        return $output;
    }

    protected function generateValidationAttributes($fields, $modelName)
    {
        $output = '';
        $kebabName = Str::kebab(Str::plural($modelName));
        foreach ($fields as $field => $type) {
            $output .= "            '{$field}' => __('{$kebabName}.fields.{$field}'),\n";
        }

        return $output;
    }

    protected function appendApiRoute($modelName, $routePrefix)
    {
        $routeFile = base_path('routes/api.php');
        if (! File::exists($routeFile)) {
            File::put($routeFile, "<?php\n\nuse Illuminate\Support\Facades\Route;\n\n");
        }

        $controllerName = "App\Http\Controllers\Api\\{$modelName}ApiController";
        $content = File::get($routeFile);

        if (! str_contains($content, "Route::apiResource('{$routePrefix}'")) {
            $content .= "\nRoute::apiResource('{$routePrefix}', {$controllerName}::class);";
            File::put($routeFile, $content);
        }
    }
}
