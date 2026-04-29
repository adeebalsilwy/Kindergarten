<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get first activity
$activity = \App\Models\Activity::first();

if ($activity) {
    echo "Activity ID: " . $activity->id . "\n";
    echo "Title: " . $activity->title . "\n";
    echo "Class: ";
    var_dump($activity->class);
    echo "\nTeacher: ";
    var_dump($activity->teacher);
    echo "\nCurriculum: ";
    var_dump($activity->curriculum);
    echo "\nRequired Materials: ";
    var_dump($activity->required_materials);
    echo "\nLearning Objectives: ";
    var_dump($activity->learning_objectives);
    echo "\nOutcomes: ";
    var_dump($activity->outcomes);
    echo "\nAssessment Criteria: ";
    var_dump($activity->assessment_criteria);
    echo "\nMaterials Needed: ";
    var_dump($activity->materials_needed);
    echo "\nAll Attributes:\n";
    print_r($activity->getAttributes());
} else {
    echo "No activities found.\n";
}
