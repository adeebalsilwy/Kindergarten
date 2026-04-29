<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test ONLY the translation keys used in activities/index.blade.php
$keys = [
    'activities.list',
    'activities.add_new',
    'activities.actions.confirm_delete',
    'global.pdf',
    'global.excel',
    'global.actions',
    'global.yes',
    'global.no',
    'global.no_records_found',
    'global.search',
    'global.filter',
];

echo "Testing Translation Keys Used in Activities Index:\n";
echo str_repeat('=', 80) . "\n\n";

$hasError = false;

foreach ($keys as $key) {
    $value = __($key);
    $type = gettype($value);
    
    echo "Key: $key\n";
    echo "  Type: $type\n";
    
    if (is_array($value)) {
        echo "  ❌ ERROR: Returns an ARRAY!\n";
        echo "  Value: " . json_encode($value) . "\n";
        $hasError = true;
    } elseif (is_string($value)) {
        echo "  ✓ Value: " . $value . "\n";
    } else {
        echo "  ⚠️ Unexpected: " . var_export($value, true) . "\n";
    }
    echo str_repeat('-', 80) . "\n";
}

if ($hasError) {
    echo "\n❌ FOUND ERRORS: Some keys return arrays instead of strings!\n";
    exit(1);
} else {
    echo "\n✓ All translation keys return strings correctly.\n";
    exit(0);
}
