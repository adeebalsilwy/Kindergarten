<?php

/**
 * Fix existing guardian language preferences
 * Run this script to convert old language values to new format
 * 
 * Usage: php fix_guardian_languages.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Guardian;

echo "🔧 Fixing Guardian Language Preferences...\n\n";

// Get all guardians
$guardians = Guardian::all();

if ($guardians->count() === 0) {
    echo "✅ No guardians found. Nothing to update.\n";
    exit(0);
}

$updated = 0;
$skipped = 0;
$errors = 0;

// Language mapping
$languageMap = [
    'english' => 'en',
    'arabic' => 'ar',
    'English' => 'en',
    'Arabic' => 'ar',
    'ENGLISH' => 'en',
    'ARABIC' => 'ar',
    'en' => 'en',
    'ar' => 'ar',
];

foreach ($guardians as $guardian) {
    try {
        $currentLang = $guardian->preferred_language;
        
        // Skip if null or empty
        if (empty($currentLang)) {
            echo "⏭️  Skipping guardian #{$guardian->id} ({$guardian->name}) - No language set\n";
            $guardian->update(['preferred_language' => 'en']);
            $updated++;
            continue;
        }
        
        // Check if needs conversion
        if (isset($languageMap[$currentLang])) {
            $newLang = $languageMap[$currentLang];
            
            if ($currentLang !== $newLang) {
                echo "🔄 Updating guardian #{$guardian->id} ({$guardian->name}): {$currentLang} → {$newLang}\n";
                $guardian->update(['preferred_language' => $newLang]);
                $updated++;
            } else {
                echo "✅ Guardian #{$guardian->id} ({$guardian->name}) already correct: {$newLang}\n";
                $skipped++;
            }
        } else {
            // Unknown language, set to English as default
            echo "⚠️  Guardian #{$guardian->id} ({$guardian->name}) - Unknown language '{$currentLang}', setting to 'en'\n";
            $guardian->update(['preferred_language' => 'en']);
            $updated++;
        }
        
    } catch (\Exception $e) {
        echo "❌ Error updating guardian #{$guardian->id}: {$e->getMessage()}\n";
        $errors++;
    }
}

echo "\n📊 Summary:\n";
echo "   ✅ Updated: {$updated}\n";
echo "   ⏭️  Skipped: {$skipped}\n";
echo "   ❌ Errors: {$errors}\n";
echo "   📝 Total: " . ($updated + $skipped + $errors) . "\n\n";

if ($errors === 0) {
    echo "✨ All guardian language preferences updated successfully!\n";
} else {
    echo "⚠️  Completed with {$errors} error(s). Please check the logs.\n";
}
