<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Classes;
use App\Models\Attendance;
use Illuminate\Support\Facades\Route;

echo "=== COMPREHENSIVE TEST REPORT ===\n\n";

// Test 1: Routes
$routesTest = [
    'grades.export.pdf' => false,
    'grades.export.excel' => false,
];

try {
    $routesTest['grades.export.pdf'] = route('grades.export.pdf') ? true : false;
    $routesTest['grades.export.excel'] = route('grades.export.excel') ? true : false;
} catch (Exception $e) {
    echo "Routes Error: " . $e->getMessage() . "\n";
}

echo "[1] ROUTES TEST:\n";
foreach ($routesTest as $route => $result) {
    echo "    {$route}: " . ($result ? "✓ PASS" : "✗ FAIL") . "\n";
}
echo "\n";

// Test 2: Classes Model Relationships
$classes = new Classes();
$relationships = [
    'curriculum' => method_exists($classes, 'curriculum'),
    'teacher' => method_exists($classes, 'teacher'),
    'gradeLevel' => method_exists($classes, 'gradeLevel'),
    'children' => method_exists($classes, 'children'),
];

echo "[2] CLASSES MODEL RELATIONSHIPS:\n";
foreach ($relationships as $rel => $exists) {
    echo "    {$rel}(): " . ($exists ? "✓ EXISTS" : "✗ MISSING") . "\n";
}
echo "\n";

// Test 3: Attendance Model
$attendance = new Attendance();
$fillable = $attendance->getFillable();
$casts = $attendance->getCasts();

$attendanceTests = [
    'check_in_time in fillable' => in_array('check_in_time', $fillable),
    'check_out_time in fillable' => in_array('check_out_time', $fillable),
    'check_in_time cast' => isset($casts['check_in_time']),
    'check_out_time cast' => isset($casts['check_out_time']),
    'absence_reason in fillable' => in_array('absence_reason', $fillable),
];

echo "[3] ATTENDANCE MODEL COLUMNS:\n";
foreach ($attendanceTests as $test => $result) {
    echo "    {$test}: " . ($result ? "✓ PASS" : "✗ FAIL") . "\n";
}
echo "\n";

// Test 4: Syntax Check
echo "[4] SYNTAX CHECK:\n";
$files = [
    'app/Models/Attendance.php',
    'app/Models/Classes.php',
    'routes/web.php',
    'app/Services/AttendanceService.php',
];

foreach ($files as $file) {
    $output = [];
    $return = 0;
    exec('php -l ' . __DIR__ . '/' . $file . ' 2>&1', $output, $return);
    $result = ($return === 0) ? "✓ PASS" : "✗ FAIL";
    echo "    {$file}: {$result}\n";
}

echo "\n=== END OF TEST REPORT ===\n";
