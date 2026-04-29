<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get first activity
$activity = \App\Models\Activity::first();

echo "Testing Activity Model Casting:\n";
echo str_repeat('=', 80) . "\n\n";

// Test array fields
$arrayFields = ['required_materials', 'learning_objectives', 'outcomes', 'assessment_criteria', 'materials_needed'];

foreach ($arrayFields as $field) {
    $value = $activity->$field;
    $type = gettype($value);
    
    echo "Field: $field\n";
    echo "  Type from model: $type\n";
    echo "  Value: ";
    
    if (is_array($value)) {
        echo json_encode($value);
    } elseif (is_null($value)) {
        echo "NULL";
    } else {
        echo var_export($value, true);
    }
    echo "\n";
    echo "  is_array(): " . (is_array($value) ? 'YES' : 'NO') . "\n";
    echo "\n";
}

echo "\nRaw attributes (from database):\n";
echo str_repeat('=', 80) . "\n";

foreach ($arrayFields as $field) {
    $rawValue = $activity->getAttributes()[$field];
    echo "$field (raw): " . gettype($rawValue) . " = ";
    if (is_null($rawValue)) {
        echo "NULL\n";
    } else {
        echo substr(var_export($rawValue, true), 0, 100) . "...\n";
    }
}
