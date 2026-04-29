<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get activities with pagination
$activities = \App\Models\Activity::paginate(15);

echo "Testing activities data:\n";
echo str_repeat('=', 80) . "\n";
echo "Total activities: " . $activities->count() . "\n";
echo str_repeat('=', 80) . "\n\n";

foreach ($activities as $index => $activity) {
    echo "Activity #" . ($index + 1) . " (ID: {$activity->id})\n";
    echo str_repeat('-', 80) . "\n";
    
    // Check each attribute
    foreach ($activity->getAttributes() as $key => $value) {
        if (!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
            $type = gettype($value);
            echo "  $key: ";
            
            if (is_null($value)) {
                echo "NULL\n";
            } elseif (is_array($value)) {
                echo "ARRAY: " . json_encode($value) . "\n";
            } elseif (is_string($value)) {
                echo "STRING: " . substr($value, 0, 50) . (strlen($value) > 50 ? '...' : '') . "\n";
            } elseif (is_bool($value)) {
                echo "BOOLEAN: " . ($value ? 'true' : 'false') . "\n";
            } else {
                echo gettype($value) . ": " . var_export($value, true) . "\n";
            }
        }
    }
    echo "\n";
}
