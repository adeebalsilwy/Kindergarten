<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test translation keys
$keys = [
    'activities.fields.title',
    'activities.fields.class_id',
    'activities.fields.teacher_id',
    'activities.fields.curriculum_id',
    'activities.fields.scheduled_date',
    'activities.fields.start_time',
    'activities.fields.end_time',
    'activities.fields.activity_type',
    'activities.fields.difficulty_level',
    'activities.fields.required_materials',
    'activities.fields.estimated_duration',
    'activities.fields.location',
    'activities.fields.is_active',
    'activities.fields.learning_objectives',
    'activities.fields.outcomes',
    'activities.fields.completed_at',
    'global.yes',
    'global.no',
    'global.view',
    'global.edit',
    'global.delete',
    'global.confirm_delete',
    'global.no_data_found',
    'global.no_data_description',
    'global.total_records',
    'global.added_this_week',
    'global.added_today',
    'global.export_pdf',
    'global.export_excel',
    'global.search',
    'global.filter',
    'global.actions',
];

echo "Testing translation keys:\n";
echo str_repeat('=', 80) . "\n";

foreach ($keys as $key) {
    $value = __($key);
    $type = gettype($value);
    
    echo "Key: $key\n";
    echo "Type: $type\n";
    
    if (is_array($value)) {
        echo "⚠️  ERROR: Returned an array!\n";
        echo "Value: ";
        print_r($value);
    } elseif (is_string($value)) {
        echo "✓ Value: $value\n";
    } else {
        echo "⚠️  Unexpected type: " . var_export($value, true) . "\n";
    }
    echo str_repeat('-', 80) . "\n";
}
