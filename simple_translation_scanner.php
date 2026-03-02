<?php

/**
 * Simple Translation Scanner Script
 * Scans all Blade view files for missing translation keys
 * and creates a report of missing keys organized by category
 *
 * Usage: php simple_translation_scanner.php
 */

class SimpleTranslationScanner
{
    private $viewDirectories = [
        'resources/views/pages',
        'resources/views/components',
        'resources/views/themes',
        'resources/views/layouts',
        'resources/views/auth',
        'resources/views/errors'
    ];

    private $langPath = 'lang/ar';
    private $missingKeys = [];
    private $existingKeys = [];
    private $stats = [
        'files_scanned' => 0,
        'keys_found' => 0,
        'categories_found' => []
    ];

    public function __construct()
    {
        $this->loadExistingTranslations();
    }

    /**
     * Load all existing translation keys from Arabic language files
     */
    private function loadExistingTranslations()
    {
        echo "Loading existing translations...\n";

        $files = glob($this->langPath . '/*.php');

        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $translations = include $file;

            if (is_array($translations)) {
                $this->extractKeys($translations, $filename);
            }
        }

        echo "Loaded " . count($this->existingKeys) . " existing translation keys\n\n";
    }

    /**
     * Recursively extract all keys from translation array
     */
    private function extractKeys($array, $prefix = '', $fileKey = '')
    {
        foreach ($array as $key => $value) {
            $fullKey = $prefix ? $prefix . '.' . $key : $key;

            if (is_array($value)) {
                $this->extractKeys($value, $fullKey, $fileKey);
            } else {
                $this->existingKeys[$fullKey] = $value;
            }
        }
    }

    /**
     * Scan all view directories for translation usage
     */
    public function scanViews()
    {
        echo "Starting comprehensive view scan...\n";

        foreach ($this->viewDirectories as $dir) {
            if (is_dir($dir)) {
                $this->scanDirectory($dir);
            }
        }

        echo "\nScan complete!\n";
        echo "Files scanned: " . $this->stats['files_scanned'] . "\n";
        echo "Translation keys found: " . $this->stats['keys_found'] . "\n";
        echo "Categories affected: " . count($this->missingKeys) . "\n\n";
    }

    /**
     * Recursively scan directory for Blade files
     */
    private function scanDirectory($directory)
    {
        if (!is_dir($directory)) {
            return;
        }

        $files = scandir($directory);

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $path = $directory . '/' . $file;

            if (is_dir($path)) {
                $this->scanDirectory($path);
            } elseif (substr($file, -10) === '.blade.php') {
                $this->scanBladeFile($path);
            } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                // Check if it's a blade file by content
                $content = file_get_contents($path);
                if (strpos($content, '{{ __(') !== false || strpos($content, '@lang') !== false || strpos($content, '__(') !== false) {
                    $this->scanBladeFile($path);
                }
            }
        }
    }

    /**
     * Scan individual Blade file for translation keys
     */
    private function scanBladeFile($filePath)
    {
        $this->stats['files_scanned']++;

        $content = file_get_contents($filePath);
        $relativePath = str_replace(['resources/views/', '.blade.php'], ['', ''], $filePath);

        // Pattern 1: __('key.name') or __('key.name', $params)
        preg_match_all('/__\([\'"]([^\'"]+)[\'"](?:,\s*\$[^)]*)?\)/', $content, $matches1);

        // Pattern 2: @lang('key.name')
        preg_match_all('/@lang\([\'"]([^\'"]+)[\'"]\)/', $content, $matches2);

        // Pattern 3: {{ __('key.name') }}
        preg_match_all('/\{\{\s*__\([\'"]([^\'"]+)[\'"](?:,\s*\$[^)]*)?\)\s*\}\}/', $content, $matches3);

        // Pattern 4: trans('key.name')
        preg_match_all('/trans\([\'"]([^\'"]+)[\'"]\)/', $content, $matches4);

        // Combine all matches
        $allMatches = array_merge(
            $matches1[1] ?? [],
            $matches2[1] ?? [],
            $matches3[1] ?? [],
            $matches4[1] ?? []
        );

        // Remove duplicates and process
        $uniqueKeys = array_unique($allMatches);

        foreach ($uniqueKeys as $key) {
            $this->processTranslationKey($key, $relativePath);
        }
    }

    /**
     * Process and categorize translation key
     */
    private function processTranslationKey($key, $sourceFile)
    {
        $this->stats['keys_found']++;

        // Skip if already exists
        if (isset($this->existingKeys[$key])) {
            return;
        }

        // Categorize by first segment
        $parts = explode('.', $key);
        $category = $parts[0];

        // Handle special cases
        if (strpos($category, '-') !== false) {
            $category = str_replace('-', '_', $category);
        }

        // Create structured key data
        $keyData = [
            'full_key' => $key,
            'category' => $category,
            'parts' => $parts,
            'source_file' => $sourceFile
        ];

        // Group by category
        if (!isset($this->missingKeys[$category])) {
            $this->missingKeys[$category] = [];
            $this->stats['categories_found'][] = $category;
        }

        $this->missingKeys[$category][] = $keyData;
    }

    /**
     * Generate report of missing keys
     */
    public function generateReport()
    {
        echo "Generating detailed report...\n\n";

        if (empty($this->missingKeys)) {
            echo "No missing translation keys found! All translations are complete.\n";
            return;
        }

        echo "MISSING TRANSLATION KEYS REPORT\n";
        echo str_repeat("=", 50) . "\n\n";

        foreach ($this->missingKeys as $category => $keys) {
            echo "CATEGORY: {$category}\n";
            echo str_repeat("-", 30) . "\n";

            foreach ($keys as $keyData) {
                echo "  Key: {$keyData['full_key']}\n";
                echo "  Source: {$keyData['source_file']}\n";
                echo "  ---\n";
            }
            echo "\n";
        }

        echo "Total missing keys: " . array_sum(array_map('count', $this->missingKeys)) . "\n";
        echo "Categories affected: " . count($this->missingKeys) . "\n\n";
    }

    /**
     * Create placeholder files for missing categories
     */
    public function createPlaceholderFiles()
    {
        if (empty($this->missingKeys)) {
            echo "No missing keys to create placeholders for.\n";
            return;
        }

        echo "Creating placeholder files for missing categories...\n\n";

        foreach ($this->missingKeys as $category => $keys) {
            $filePath = $this->langPath . '/' . $category . '.php';

            if (!file_exists($filePath)) {
                // Create a basic structure with common keys
                $commonKeys = [
                    'title' => 'العنوان',
                    'list' => 'القائمة',
                    'add_new' => 'إضافة جديد',
                    'edit' => 'تعديل',
                    'show' => 'عرض',
                    'delete' => 'حذف',
                    'save' => 'حفظ',
                    'cancel' => 'إلغاء',
                    'created' => 'تم الإنشاء بنجاح',
                    'updated' => 'تم التحديث بنجاح',
                    'deleted' => 'تم الحذف بنجاح'
                ];

                $content = "<?php\n\nreturn [\n";

                // Add common keys first
                foreach ($commonKeys as $key => $value) {
                    $content .= "    '{$key}' => '{$value}',\n";
                }

                // Add specific missing keys
                foreach ($keys as $keyData) {
                    $lastPart = end($keyData['parts']);
                    $placeholder = $lastPart; // Use the last part as placeholder
                    $content .= "    '" . implode("']['", $keyData['parts']) . "' => '{$placeholder}',\n";
                }

                $content .= "];\n";

                file_put_contents($filePath, $content);
                echo "Created: {$filePath}\n";
            } else {
                // Update existing file with missing keys
                $this->updateExistingFile($filePath, $keys);
            }
        }
    }

    /**
     * Update existing translation file with missing keys
     */
    private function updateExistingFile($filePath, $keys)
    {
        $translations = include $filePath;
        $modified = false;

        foreach ($keys as $keyData) {
            $current = &$translations;
            $parts = $keyData['parts'];

            // Navigate to the correct position in the array
            for ($i = 0; $i < count($parts) - 1; $i++) {
                $part = $parts[$i];
                if (!isset($current[$part])) {
                    $current[$part] = [];
                }
                $current = &$current[$part];
            }

            // Set the final value if it doesn't exist
            $finalKey = end($parts);
            if (!isset($current[$finalKey])) {
                $current[$finalKey] = $finalKey; // Use the key name as placeholder
                $modified = true;
            }
        }

        if ($modified) {
            $content = "<?php\n\nreturn " . $this->arrayToString($translations) . ";\n";
            file_put_contents($filePath, $content);
            echo "Updated: {$filePath}\n";
        }
    }

    /**
     * Convert array to PHP string format (simplified)
     */
    private function arrayToString($array, $indent = 1)
    {
        $indentStr = str_repeat('    ', $indent);
        $result = "[\n";

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result .= "{$indentStr}'{$key}' => " . $this->arrayToString($value, $indent + 1) . ",\n";
            } else {
                // Escape single quotes properly
                $escapedValue = str_replace(["'", "\\"], ["\\'", "\\\\"], $value);
                $result .= "{$indentStr}'{$key}' => '{$escapedValue}',\n";
            }
        }

        $result .= str_repeat('    ', $indent - 1) . "]";
        return $result;
    }

    /**
     * Run the complete scan and update process
     */
    public function run()
    {
        echo "=== SIMPLE TRANSLATION SCANNER ===\n\n";

        // Scan views
        $this->scanViews();

        // Generate report
        $this->generateReport();

        // Create/update files
        echo "Creating/updating translation files with missing keys...\n";
        $this->createPlaceholderFiles();

        echo "\n=== SCAN COMPLETE ===\n";
    }
}

// Run the scanner
if (php_sapi_name() === 'cli') {
    $scanner = new SimpleTranslationScanner();
    $scanner->run();
}
