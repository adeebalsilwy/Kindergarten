<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class RegenerateAllCruds extends Command
{
    protected $signature = 'make:crud-all {--force : Overwrite existing files}';

    protected $description = 'Regenerate all CRUDs for the project to ensure consistency and clean up duplicates';

    public function handle()
    {
        $modules = [
            'Language',
            'Teacher',
            'Class',
            'Fee',
            'Expense',
            'FinancialReport',
            'AccountingEntry',
            'Parent',
            'Child',
            'Attendance',
            'Grade',
            'Payment',
            'DashboardContent',
        ];

        $this->info('Starting global CRUD regeneration and cleanup...');

        // 1. Clean up misplaced Models directory
        $misplacedModelsDir = app_path('Models/Models');
        if (File::isDirectory($misplacedModelsDir)) {
            $this->info('Removing misplaced directory: app/Models/Models');
            File::deleteDirectory($misplacedModelsDir);
        }

        // 2. Clean up web.php (remove app-generated routes and use statements)
        $this->info('Cleaning up routes/web.php...');
        $this->cleanupRoutes();

        // 3. Clean up SideMenu.php (remove items added at the end)
        $this->info('Cleaning up SideMenu.php...');
        $this->cleanupSideMenu();

        // 4. Regenerate all modules
        foreach ($modules as $module) {
            $this->info("Regenerating: {$module}");
            Artisan::call('make:crud', [
                'name' => $module,
                '--force' => $this->option('force'),
            ], $this->getOutput());
        }

        $this->info('All CRUDs have been regenerated and cleaned up!');
    }

    protected function cleanupRoutes()
    {
        $path = base_path('routes/web.php');
        $content = File::get($path);

        // Remove app-generated use statements (from Controllers)
        $content = preg_replace('/use App\\\\Http\\\\Controllers\\\\[a-zA-Z]+Controller;\n/', '', $content);

        // Keep the original resource routes if they were manually added,
        // but since GenerateCrud appends things after // CRUD Resource Routes,
        // we can truncate or clean that section.

        if (str_contains($content, '// CRUD Resource Routes')) {
            // Find everything between // CRUD Resource Routes and // Role and Permission... or end of block
            $pattern = '/\/\/ CRUD Resource Routes.*?(?=\/\/ Role and Permission|\z)/s';
            $content = preg_replace($pattern, "// CRUD Resource Routes\n", $content);
        }

        // Also remove export routes
        $content = preg_replace('/\/\/ Export Routes for [a-zA-Z]+.*?(?=\s+\/\/|\z)/s', '', $content);

        File::put($path, $content);
    }

    protected function cleanupSideMenu()
    {
        $path = app_path('Main/SideMenu.php');
        $content = File::get($path);

        // Find the "widgets" item and remove everything after it until the end of the array
        // In the current file, 'widgets' ends around line 581. The generated items start at 583.

        if (str_contains($content, "'widgets' => [")) {
            // Find the end of 'widgets' array item
            $pattern = "/'widgets' => \[.*?^            \],/ms";
            if (preg_match($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
                $pos = $matches[0][1] + strlen($matches[0][0]);
                // Truncate from $pos to the last ];
                $lastBracket = strrpos($content, '];');
                if ($lastBracket !== false && $lastBracket > $pos) {
                    $newContent = substr($content, 0, $pos)."\n        ];\n    }\n}\n";
                    File::put($path, $newContent);
                }
            }
        }
    }
}
