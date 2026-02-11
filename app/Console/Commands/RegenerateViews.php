<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RegenerateViews extends GenerateCrud
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:views {name? : The name of the model (e.g. Car) or "all"} {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate views for a model or all models using the latest stubs and components.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $force = $this->option('force');

        if (! $name) {
            $name = $this->ask('Please provide the model name or types "all"');
        }

        if ($name === 'all') {
            $this->regenerateAll($force);

            return;
        }

        $this->regenerateForModel($name, $force);
    }

    protected function regenerateAll($force)
    {
        $modelsPath = app_path('Models');
        $files = File::files($modelsPath);

        foreach ($files as $file) {
            $modelName = $file->getFilenameWithoutExtension();
            // Skip core/default models if needed, but let's just try for all custom ones
            if (in_array($modelName, ['User', 'Role', 'Permission', 'AccountingEntries', 'Expenses', 'Fees', 'Payments'])) {
                $this->regenerateForModel($modelName, $force);
            }
        }
        $this->info('All views regenerated (for known models)!');
    }

    protected function regenerateForModel($name, $force)
    {
        $modelName = Str::studly($name);
        $variableName = Str::camel($name);
        $variableNamePlural = Str::plural($variableName);
        $routePrefix = Str::kebab(Str::plural($name));
        $viewPath = Str::kebab(Str::plural($name));

        $this->info("Regenerating views for {$modelName}...");

        $fields = $this->getFieldsFromMigration($name);

        if (empty($fields)) {
            // Try to guess from fillable if migration not found easily (fallback)
            // But GenerateCrud depends on migration. Let's assume migration exists.
            $this->warn("Could not parse migration for {$modelName}. Skipping.");

            return;
        }

        // Generate Views Only
        $viewDir = resource_path("views/pages/{$viewPath}");
        if (! File::isDirectory($viewDir)) {
            File::makeDirectory($viewDir, 0755, true);
        }

        // We also need language files for the views
        $this->generateLangFile($modelName, $fields);
        $this->updateGlobalLang();

        $tableHeaders = $this->generateTableHeaders($fields, $modelName);
        $tableBody = $this->generateTableBody($fields, $variableName);
        $formFields = $this->generateFormFields($fields, $variableName, $modelName);

        // INDEX
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
            ],
            true // Force overwrite for this command
        );

        // CREATE
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
            true
        );

        // EDIT
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
            true
        );

        $this->info("Views for {$modelName} regenerated.");
    }
}
