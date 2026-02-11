<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $contractsPath = app_path('Repositories/Contracts');
        $eloquentPath = app_path('Repositories/Eloquent');

        if (File::isDirectory($contractsPath)) {
            $files = File::files($contractsPath);

            foreach ($files as $file) {
                $filename = $file->getFilenameWithoutExtension();

                if ($filename === 'BaseRepositoryInterface') {
                    continue;
                }

                $interface = "App\\Repositories\\Contracts\\{$filename}";

                // Assuming implementation follows the naming convention:
                // Interface: ModelRepositoryInterface
                // Implementation: ModelRepository
                $implementationName = str_replace('Interface', '', $filename);
                $implementation = "App\\Repositories\\Eloquent\\{$implementationName}";

                if (class_exists($implementation)) {
                    $this->app->bind($interface, $implementation);
                }
            }
        }

        // Bind Base Repository
        $this->app->bind(
            \App\Repositories\Contracts\BaseRepositoryInterface::class,
            \App\Repositories\Eloquent\BaseRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
