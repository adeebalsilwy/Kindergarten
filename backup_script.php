<?php

/**
 * Simple backup script to copy project files to backup directory
 */
function copyDirectory($source, $destination, $exclude = [])
{
    // Create destination directory if it doesn't exist
    if (! is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($iterator as $item) {
        $relativePath = substr($item->getPathname(), strlen($source) + 1);

        // Skip excluded directories
        $shouldSkip = false;
        foreach ($exclude as $excludePattern) {
            if (strpos($relativePath, $excludePattern) === 0) {
                $shouldSkip = true;
                break;
            }
        }

        if ($shouldSkip) {
            continue;
        }

        $targetPath = $destination.DIRECTORY_SEPARATOR.$relativePath;

        if ($item->isFile()) {
            // Ensure parent directory exists
            $parentDir = dirname($targetPath);
            if (! is_dir($parentDir)) {
                mkdir($parentDir, 0755, true);
            }
            copy($item->getPathname(), $targetPath);
        }
    }
}

// Define source and destination
$sourceDir = __DIR__;
$destDir = __DIR__.'/backup/full_project_backup';

// Define directories to exclude
$excludeDirs = [
    'backup',
    '.git',
    'node_modules',
    'vendor/storage',
    'storage/framework/views',
    'bootstrap/cache',
    'vendor/composer',
];

echo "Starting backup...\n";
copyDirectory($sourceDir, $destDir, $excludeDirs);
echo "Backup completed to: $destDir\n";
