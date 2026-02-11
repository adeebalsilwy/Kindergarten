<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BackupService
{
    protected $backupPath;

    public function __construct()
    {
        $this->backupPath = storage_path('backups/crud-backups');

        // Ensure backup directory exists
        if (! File::exists($this->backupPath)) {
            File::makeDirectory($this->backupPath, 0755, true);
        }
    }

    /**
     * Create a backup of model and related files
     */
    public function backupModelFiles(string $modelName): array
    {
        $backupId = uniqid('backup_'.time().'_', true);
        $backupDir = $this->backupPath.'/'.$backupId;

        File::makeDirectory($backupDir, 0755, true);

        $backupFiles = [];
        $modelStudly = Str::studly($modelName);

        // Define the files to backup
        $filesToBackup = [
            // Model
            [
                'source' => app_path("Models/{$modelStudly}.php"),
                'dest' => "models/{$modelStudly}.php",
                'type' => 'model',
            ],
            // Controller
            [
                'source' => app_path("Http/Controllers/{$modelStudly}Controller.php"),
                'dest' => "controllers/{$modelStudly}Controller.php",
                'type' => 'controller',
            ],
            // Service
            [
                'source' => app_path("Services/{$modelStudly}Service.php"),
                'dest' => "services/{$modelStudly}Service.php",
                'type' => 'service',
            ],
            // Repository
            [
                'source' => app_path("Repositories/Eloquent/{$modelStudly}Repository.php"),
                'dest' => "repositories/{$modelStudly}Repository.php",
                'type' => 'repository',
            ],
            // Repository Interface
            [
                'source' => app_path("Repositories/Contracts/{$modelStudly}RepositoryInterface.php"),
                'dest' => "repositories_interfaces/{$modelStudly}RepositoryInterface.php",
                'type' => 'repository_interface',
            ],
            // Store Request
            [
                'source' => app_path("Http/Requests/Store{$modelStudly}Request.php"),
                'dest' => "requests/Store{$modelStudly}Request.php",
                'type' => 'request_store',
            ],
            // Update Request
            [
                'source' => app_path("Http/Requests/Update{$modelStudly}Request.php"),
                'dest' => "requests/Update{$modelStudly}Request.php",
                'type' => 'request_update',
            ],
            // API Controller
            [
                'source' => app_path("Http/Controllers/Api/{$modelStudly}ApiController.php"),
                'dest' => "api_controllers/{$modelStudly}ApiController.php",
                'type' => 'api_controller',
            ],
            // API Resource
            [
                'source' => app_path("Http/Resources/{$modelStudly}Resource.php"),
                'dest' => "resources/{$modelStudly}Resource.php",
                'type' => 'api_resource',
            ],
            // Views
            [
                'source' => resource_path('views/pages/'.Str::kebab(Str::plural($modelName))),
                'dest' => 'views',
                'type' => 'views',
            ],
            // Localization
            [
                'source' => base_path('lang/en/'.Str::kebab(Str::plural($modelName)).'.php'),
                'dest' => 'lang/en/'.Str::kebab(Str::plural($modelName)).'.php',
                'type' => 'lang_en',
            ],
            [
                'source' => base_path('lang/ar/'.Str::kebab(Str::plural($modelName)).'.php'),
                'dest' => 'lang/ar/'.Str::kebab(Str::plural($modelName)).'.php',
                'type' => 'lang_ar',
            ],
        ];

        foreach ($filesToBackup as $file) {
            $source = $file['source'];
            $dest = $backupDir.'/'.$file['dest'];

            if (File::exists($source)) {
                if (File::isDirectory($source)) {
                    // Copy entire directory
                    $this->copyDirectory($source, $dest);
                } else {
                    // Copy single file
                    $destDir = dirname($dest);
                    if (! File::exists($destDir)) {
                        File::makeDirectory($destDir, 0755, true);
                    }
                    File::copy($source, $dest);
                }

                $backupFiles[] = [
                    'type' => $file['type'],
                    'source' => $source,
                    'destination' => $dest,
                    'size' => File::size($source),
                    'timestamp' => time(),
                ];
            }
        }

        // Create metadata file
        $metadata = [
            'backup_id' => $backupId,
            'model_name' => $modelStudly,
            'created_at' => now()->toISOString(),
            'backup_files' => $backupFiles,
            'count' => count($backupFiles),
        ];

        File::put($backupDir.'/metadata.json', json_encode($metadata, JSON_PRETTY_PRINT));

        return [
            'success' => true,
            'backup_id' => $backupId,
            'backup_path' => $backupDir,
            'metadata' => $metadata,
        ];
    }

    /**
     * Restore a backup
     */
    public function restoreBackup(string $backupId): array
    {
        $backupDir = $this->backupPath.'/'.$backupId;

        if (! File::exists($backupDir)) {
            return [
                'success' => false,
                'message' => 'Backup not found',
            ];
        }

        $metadataPath = $backupDir.'/metadata.json';
        if (! File::exists($metadataPath)) {
            return [
                'success' => false,
                'message' => 'Metadata file not found',
            ];
        }

        $metadata = json_decode(File::get($metadataPath), true);
        $restoredFiles = [];

        foreach ($metadata['backup_files'] as $file) {
            $source = $file['destination'];
            $destination = $file['source'];

            if (File::exists($source)) {
                // Create destination directory if it doesn't exist
                $destDir = dirname($destination);
                if (! File::exists($destDir)) {
                    File::makeDirectory($destDir, 0755, true);
                }

                if (File::isDirectory($source)) {
                    $this->copyDirectory($source, $destination);
                } else {
                    File::copy($source, $destination);
                }

                $restoredFiles[] = [
                    'type' => $file['type'],
                    'source' => $source,
                    'destination' => $destination,
                    'restored' => true,
                ];
            }
        }

        return [
            'success' => true,
            'message' => 'Backup restored successfully',
            'restored_files' => $restoredFiles,
        ];
    }

    /**
     * List all available backups
     */
    public function listBackups(): array
    {
        if (! File::exists($this->backupPath)) {
            return [];
        }

        $directories = File::directories($this->backupPath);
        $backups = [];

        foreach ($directories as $dir) {
            $basename = basename($dir);
            $metadataPath = $dir.'/metadata.json';

            if (File::exists($metadataPath)) {
                $metadata = json_decode(File::get($metadataPath), true);
                $backups[] = $metadata;
            } else {
                $backups[] = [
                    'backup_id' => $basename,
                    'model_name' => 'Unknown',
                    'created_at' => date('Y-m-d H:i:s', filemtime($dir)),
                    'backup_files' => [],
                    'count' => 0,
                ];
            }
        }

        // Sort by creation date (newest first)
        usort($backups, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        return $backups;
    }

    /**
     * Delete a specific backup
     */
    public function deleteBackup(string $backupId): array
    {
        $backupDir = $this->backupPath.'/'.$backupId;

        if (! File::exists($backupDir)) {
            return [
                'success' => false,
                'message' => 'Backup not found',
            ];
        }

        File::deleteDirectory($backupDir);

        return [
            'success' => true,
            'message' => 'Backup deleted successfully',
        ];
    }

    /**
     * Copy directory recursively
     */
    private function copyDirectory(string $src, string $dst): void
    {
        if (! File::exists($dst)) {
            File::makeDirectory($dst, 0755, true);
        }

        $files = File::allFiles($src);
        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $destPath = $dst.DIRECTORY_SEPARATOR.$relativePath;
            $destDir = dirname($destPath);

            if (! File::exists($destDir)) {
                File::makeDirectory($destDir, 0755, true);
            }

            File::copy($file->getPathname(), $destPath);
        }
    }
}
