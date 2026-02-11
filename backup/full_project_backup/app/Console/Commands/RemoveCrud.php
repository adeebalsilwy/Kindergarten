<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RemoveCrud extends Command
{
    protected $signature = 'remove:crud {model}';

    protected $description = 'Remove CRUD files for a given model';

    public function handle()
    {
        $modelName = Str::studly($this->argument('model'));
        $tableName = Str::snake(Str::plural($modelName));

        $this->info("Removing CRUD for {$modelName}...");

        // Remove files
        $filesToRemove = [
            app_path("Models/{$modelName}.php"),
            app_path("Repositories/Contracts/{$modelName}RepositoryInterface.php"),
            app_path("Repositories/Eloquent/{$modelName}Repository.php"),
            app_path("Services/{$modelName}Service.php"),
            app_path("Http/Controllers/{$modelName}Controller.php"),
            app_path("Http/Requests/Store{$modelName}Request.php"),
            app_path("Http/Requests/Update{$modelName}Request.php"),
            resource_path("views/pages/{$tableName}/index.blade.php"),
            resource_path("views/pages/{$tableName}/create.blade.php"),
            resource_path("views/pages/{$tableName}/edit.blade.php"),
            lang_path("en/{$tableName}.php"),
            lang_path("ar/{$tableName}.php"),
        ];

        foreach ($filesToRemove as $file) {
            if (File::exists($file)) {
                File::delete($file);
                $this->line('Removed: '.str_replace(base_path(), '', $file));
            }
        }

        // Remove view directory if empty
        $viewDir = resource_path("views/pages/{$tableName}");
        if (File::exists($viewDir) && File::isEmptyDirectory($viewDir)) {
            File::deleteDirectory($viewDir);
            $this->line('Removed directory: '.str_replace(base_path(), '', $viewDir));
        }

        // Remove routes
        $routesFile = base_path('routes/web.php');
        if (File::exists($routesFile)) {
            $routesContent = File::get($routesFile);
            $pattern = '/Route::resource\(\'[^\']+\', [^;]+::class\);\s*/';
            $routesContent = preg_replace($pattern, '', $routesContent);

            // Remove controller use statement
            $usePattern = '/use App\\\\Http\\\\Controllers\\\\'.$modelName.'Controller;\s*/';
            $routesContent = preg_replace($usePattern, '', $routesContent);

            File::put($routesFile, $routesContent);
            $this->line('Updated routes file');
        }

        // Remove from menu
        $menuFile = app_path('Main/SideMenu.php');
        if (File::exists($menuFile)) {
            $menuContent = File::get($menuFile);
            $menuPattern = '/\s*\''.strtolower($modelName).'\' => \[[^\]]+\],/';
            $menuContent = preg_replace($menuPattern, '', $menuContent);
            File::put($menuFile, $menuContent);
            $this->line('Updated menu file');
        }

        $this->info("CRUD removal for {$modelName} completed successfully!");
    }
}
