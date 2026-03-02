<?php

/**
 * Script to check for missing translation keys in Arabic files compared to English files
 */

function getTranslationKeys($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }

    $array = include $filePath;
    return flattenArray($array);
}

function flattenArray($array, $prefix = '') {
    $result = [];

    foreach ($array as $key => $value) {
        $newKey = $prefix === '' ? $key : "$prefix.$key";

        if (is_array($value)) {
            $result = array_merge($result, flattenArray($value, $newKey));
        } else {
            $result[$newKey] = $value;
        }
    }

    return $result;
}

function compareTranslations($enDir, $arDir) {
    $enFiles = scandir($enDir);
    $missingKeys = [];

    foreach ($enFiles as $file) {
        if ($file === '.' || $file === '..' || !str_ends_with($file, '.php')) {
            continue;
        }

        $enFilePath = $enDir . DIRECTORY_SEPARATOR . $file;
        $arFilePath = $arDir . DIRECTORY_SEPARATOR . $file;

        if (!file_exists($arFilePath)) {
            echo "❌ Missing Arabic translation file: $file\n";
            continue;
        }

        $enKeys = getTranslationKeys($enFilePath);
        $arKeys = getTranslationKeys($arFilePath);

        $missingInAr = array_diff_key($enKeys, $arKeys);

        if (!empty($missingInAr)) {
            $missingKeys[$file] = $missingInAr;
            echo "\n❌ Missing keys in Arabic file: $file\n";
            foreach ($missingInAr as $key => $value) {
                echo "   • '$key' => '" . addslashes($value) . "',\n";
            }
        } else {
            echo "✅ All keys translated in: $file\n";
        }
    }

    return $missingKeys;
}

function addMissingKeysToArabicFiles($missingKeys, $arDir) {
    foreach ($missingKeys as $file => $keys) {
        $arFilePath = $arDir . DIRECTORY_SEPARATOR . $file;
        $content = file_get_contents($arFilePath);

        // Find the last occurrence of '];' to insert before it
        $insertPosition = strrpos($content, '];');

        if ($insertPosition !== false) {
            $newContent = substr($content, 0, $insertPosition);

            $newContent .= "\n    // Missing translations added from English\n";
            foreach ($keys as $key => $value) {
                $translatedValue = translateEnglishToArabic($value);
                $newContent .= "    '$key' => '" . addslashes($translatedValue) . "',\n";
            }

            $newContent .= substr($content, $insertPosition);

            // Write the updated content back to the file
            file_put_contents($arFilePath, $newContent);
            echo "✅ Added missing keys to $file\n";
        }
    }
}

// Simple English to Arabic translation function (placeholder - would need proper translation service in real implementation)
function translateEnglishToArabic($englishText) {
    // This is a placeholder - in a real scenario, you'd use a translation API
    // For now, we'll return the English text with a note, but in practice you'd want real Arabic translations
    $translations = [
        'title' => 'العنوان',
        'add_new' => 'إضافة جديد',
        'edit' => 'تعديل',
        'list' => 'قائمة',
        'fields' => 'الحقول',
        'name' => 'الاسم',
        'code' => 'الرمز',
        'description' => 'الوصف',
        'actions' => 'الإجراءات',
        'save' => 'حفظ',
        'cancel' => 'إلغاء',
        'update' => 'تحديث',
        'delete' => 'حذف',
        'confirm_delete' => 'هل أنت متأكد؟',
        'messages' => 'الرسائل',
        'created' => 'تم الإنشاء',
        'updated' => 'تم التحديث',
        'deleted' => 'تم الحذف',
        'successfully' => 'بنجاح',
        'Record created successfully.' => 'تم إنشاء السجل بنجاح.',
        'Record updated successfully.' => 'تم تحديث السجل بنجاح.',
        'Record deleted successfully.' => 'تم حذف السجل بنجاح.',
        'Child Id' => 'معرف الطفل',
        'Fee Id' => 'معرف الرسوم',
        'Amount' => 'المبلغ',
        'Payment Date' => 'تاريخ الدفع',
        'Payment Method' => 'طريقة الدفع',
        'Reference Number' => 'رقم المرجع',
        'Status' => 'الحالة',
        'Receipt Number' => 'رقم الإيصال',
    ];

    // Return Arabic translation if available, otherwise return original with note
    return $translations[$englishText] ?? $englishText . ' [TRANSLATE]';
}

echo "🔍 Analyzing translation files...\n";
echo "English directory: " . __DIR__ . "/lang/en\n";
echo "Arabic directory: " . __DIR__ . "/lang/ar\n\n";

$missingKeys = compareTranslations(
    __DIR__ . '/lang/en',
    __DIR__ . '/lang/ar'
);

if (empty($missingKeys)) {
    echo "\n🎉 All Arabic translation files are complete!\n";
} else {
    echo "\n⚠️  Found " . count($missingKeys) . " files with missing translation keys.\n";

    // Uncomment the following line to automatically add missing keys (with placeholder translations)
    // addMissingKeysToArabicFiles($missingKeys, __DIR__ . '/lang/ar');

    echo "\n💡 Tip: Consider using a professional translation service to properly translate the missing keys.\n";
}

echo "\n📋 Analysis completed.\n";
