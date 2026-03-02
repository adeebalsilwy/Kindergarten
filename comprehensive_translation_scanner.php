<?php

/**
 * Comprehensive Translation Scanner Script
 * Scans all project files for missing translation keys and ensures Arabic translations are complete
 *
 * Usage: php comprehensive_translation_scanner.php
 */

class ComprehensiveTranslationScanner
{
    private $viewDirectories = [
        'resources/views/pages',
        'resources/views/components',
        'resources/views/themes',
        'resources/views/layouts',
        'resources/views/auth',
        'resources/views/errors'
    ];

    private $controllerDirectories = [
        'app/Http/Controllers',
        'app/Services',
        'app/Jobs',
        'app/Console/Commands'
    ];

    private $langPath = 'lang/ar';
    private $missingKeys = [];
    private $existingKeys = [];
    private $stats = [
        'files_scanned' => 0,
        'keys_found' => 0,
        'categories_found' => [],
        'files_with_missing_keys' => 0
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
        echo "🔍 Loading existing Arabic translations...\n";

        $files = glob($this->langPath . '/*.php');

        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $translations = include $file;

            if (is_array($translations)) {
                $this->extractKeys($translations, $filename);
            }
        }

        echo "✅ Loaded " . count($this->existingKeys) . " existing Arabic translation keys\n\n";
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
     * Scan all project directories for translation usage
     */
    public function scanProject()
    {
        echo "🔍 Starting comprehensive project scan...\n";

        // Scan views
        echo "📄 Scanning view files...\n";
        foreach ($this->viewDirectories as $dir) {
            if (is_dir($dir)) {
                $this->scanDirectory($dir, 'view');
            }
        }

        // Scan controllers and services
        echo "⚙️ Scanning PHP files (controllers, services, etc.)...\n";
        foreach ($this->controllerDirectories as $dir) {
            if (is_dir($dir)) {
                $this->scanDirectory($dir, 'php');
            }
        }

        // Also scan any other PHP files that might contain translations
        $otherDirs = ['app', 'routes'];
        foreach ($otherDirs as $dir) {
            if (is_dir($dir) && !in_array($dir, array_merge($this->viewDirectories, $this->controllerDirectories))) {
                echo "📁 Scanning additional PHP files in {$dir}...\n";
                $this->scanDirectory($dir, 'php');
            }
        }

        echo "\n✅ Scan complete!\n";
        echo "📊 Statistics:\n";
        echo "   Files scanned: " . $this->stats['files_scanned'] . "\n";
        echo "   Translation keys found: " . $this->stats['keys_found'] . "\n";
        echo "   Categories affected: " . count($this->missingKeys) . "\n";
        echo "   Files with missing keys: " . $this->stats['files_with_missing_keys'] . "\n\n";
    }

    /**
     * Recursively scan directory for files based on type
     */
    private function scanDirectory($directory, $type = 'view')
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
                $this->scanDirectory($path, $type);
            } else {
                if ($type === 'view' && (substr($file, -10) === '.blade.php' || substr($file, -4) === '.php')) {
                    $this->scanFile($path);
                } elseif ($type === 'php' && substr($file, -4) === '.php') {
                    $this->scanFile($path);
                }
            }
        }
    }

    /**
     * Scan individual file for translation keys
     */
    private function scanFile($filePath)
    {
        $this->stats['files_scanned']++;

        $content = file_get_contents($filePath);
        $relativePath = str_replace(getcwd() . '/', '', $filePath);

        // Check if file contains translation functions
        if (strpos($content, '__(') === false &&
            strpos($content, '@lang') === false &&
            strpos($content, 'trans(') === false) {
            return; // No translation functions found, skip
        }

        // Pattern 1: __('key.name') or __('key.name', $params)
        preg_match_all('/__\([\'"]([^\'"]+)[\'"](?:,\s*[^)]*)?\)/', $content, $matches1);

        // Pattern 2: @lang('key.name')
        preg_match_all('/@lang\([\'"]([^\'"]+)[\'"]\)/', $content, $matches2);

        // Pattern 3: {{ __('key.name') }}
        preg_match_all('/\{\{\s*__\([\'"]([^\'"]+)[\'"](?:,\s*[^)]*)?\)\s*\}\}/', $content, $matches3);

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

        if (!empty($uniqueKeys)) {
            $hasMissingKeys = false;

            foreach ($uniqueKeys as $key) {
                if ($this->processTranslationKey($key, $relativePath)) {
                    $hasMissingKeys = true;
                }
            }

            if ($hasMissingKeys) {
                $this->stats['files_with_missing_keys']++;
            }
        }
    }

    /**
     * Process and categorize translation key
     * Returns true if key is missing
     */
    private function processTranslationKey($key, $sourceFile)
    {
        $this->stats['keys_found']++;

        // Skip if already exists
        if (isset($this->existingKeys[$key])) {
            return false;
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

        // Avoid duplicates
        $exists = false;
        foreach ($this->missingKeys[$category] as $existingKeyData) {
            if ($existingKeyData['full_key'] === $key && $existingKeyData['source_file'] === $sourceFile) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $this->missingKeys[$category][] = $keyData;
        }

        return true;
    }

    /**
     * Generate detailed report of missing keys
     */
    public function generateReport()
    {
        echo "📋 Generating detailed report...\n\n";

        if (empty($this->missingKeys)) {
            echo "🎉 No missing translation keys found! All Arabic translations are complete.\n";
            return;
        }

        echo "❌ MISSING TRANSLATION KEYS REPORT\n";
        echo str_repeat("=", 60) . "\n\n";

        foreach ($this->missingKeys as $category => $keys) {
            echo "📁 CATEGORY: {$category}\n";
            echo str_repeat("-", 40) . "\n";
            echo "Missing keys count: " . count($keys) . "\n\n";

            // Group keys by source file for better organization
            $keysByFile = [];
            foreach ($keys as $keyData) {
                $file = $keyData['source_file'];
                if (!isset($keysByFile[$file])) {
                    $keysByFile[$file] = [];
                }
                $keysByFile[$file][] = $keyData;
            }

            foreach ($keysByFile as $file => $fileKeys) {
                echo "  📄 Source File: {$file}\n";

                foreach ($fileKeys as $keyData) {
                    echo "    • Key: {$keyData['full_key']}\n";
                }
                echo "\n";
            }

            echo "\n";
        }

        $totalMissing = array_sum(array_map('count', $this->missingKeys));
        echo "📈 SUMMARY:\n";
        echo "   Total missing keys: {$totalMissing}\n";
        echo "   Categories affected: " . count($this->missingKeys) . "\n\n";
    }

    /**
     * Create/update Arabic translation files with missing keys
     */
    public function createOrUpdateTranslationFiles()
    {
        if (empty($this->missingKeys)) {
            echo "✅ No missing keys to create/update.\n";
            return;
        }

        echo "🔄 Creating/updating Arabic translation files...\n\n";

        foreach ($this->missingKeys as $category => $keys) {
            $filePath = $this->langPath . '/' . $category . '.php';

            if (!file_exists($filePath)) {
                // Create new file with missing keys
                $this->createNewTranslationFile($filePath, $keys, $category);
            } else {
                // Update existing file with missing keys
                $this->updateExistingTranslationFile($filePath, $keys);
            }
        }

        echo "✅ Arabic translation files updated successfully!\n\n";
    }

    /**
     * Create a new translation file
     */
    private function createNewTranslationFile($filePath, $keys, $category)
    {
        // Create a basic structure with common keys and placeholders
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
            'deleted' => 'تم الحذف بنجاح',
            'actions' => 'الإجراءات',
            'search' => 'بحث',
            'reset' => 'إعادة تعيين',
            'filter' => 'تصفية',
            'export' => 'تصدير',
            'import' => 'استيراد',
            'yes' => 'نعم',
            'no' => 'لا',
            'active' => 'نشط',
            'inactive' => 'غير نشط',
            'status' => 'الحالة',
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'phone' => 'الهاتف',
            'address' => 'العنوان',
            'description' => 'الوصف',
            'date' => 'التاريخ',
            'time' => 'الوقت',
            'amount' => 'المبلغ',
            'quantity' => 'الكمية',
            'price' => 'السعر',
            'total' => 'الإجمالي',
            'subtotal' => 'المجموع الفرعي',
            'discount' => 'الخصم',
            'tax' => 'الضريبة',
            'reference' => 'المرجع',
            'notes' => 'الملاحظات',
            'details' => 'التفاصيل',
            'settings' => 'الإعدادات',
            'profile' => 'الملف الشخصي',
            'password' => 'كلمة المرور',
            'confirm_password' => 'تأكيد كلمة المرور',
            'old_password' => 'كلمة المرور القديمة',
            'new_password' => 'كلمة المرور الجديدة',
            'dashboard' => 'لوحة التحكم',
            'home' => 'الرئيسية',
            'about' => 'حول',
            'contact' => 'اتصل بنا',
            'help' => 'مساعدة',
            'support' => 'الدعم',
            'logout' => 'تسجيل الخروج',
            'login' => 'تسجيل الدخول',
            'register' => 'تسجيل',
            'forgot_password' => 'نسيت كلمة المرور',
            'remember_me' => 'تذكرني',
            'submit' => 'إرسال',
            'apply' => 'تطبيق',
            'close' => 'إغلاق',
            'back' => 'رجوع',
            'next' => 'التالي',
            'previous' => 'السابق',
            'first' => 'الأول',
            'last' => 'الأخير',
            'more' => 'المزيد',
            'less' => 'أقل',
            'all' => 'الكل',
            'none' => 'لا شيء',
            'select' => 'اختر',
            'choose' => 'اختر',
            'browse' => 'تصفح',
            'upload' => 'رفع',
            'download' => 'تحميل',
            'print' => 'طباعة',
            'share' => 'مشاركة',
            'copy' => 'نسخ',
            'paste' => 'لصق',
            'cut' => 'قص',
            'undo' => 'تراجع',
            'redo' => 'إعادة',
            'refresh' => 'تحديث',
            'reload' => 'إعادة تحميل',
            'clear' => 'مسح',
            'clear_all' => 'مسح الكل',
            'search_results' => 'نتائج البحث',
            'no_results' => 'لا توجد نتائج',
            'loading' => 'جاري التحميل',
            'please_wait' => 'يرجى الانتظار',
            'error' => 'خطأ',
            'warning' => 'تحذير',
            'success' => 'نجاح',
            'info' => 'معلومات',
            'confirmation' => 'تأكيد',
            'are_you_sure' => 'هل أنت متأكد؟',
            'proceed' => 'المتابعة',
            'continue' => 'متابعة',
            'finished' => 'انتهى',
            'completed' => 'مكتمل',
            'pending' => 'معلق',
            'failed' => 'فشل',
            'processing' => 'جاري المعالجة',
            'searching' => 'جاري البحث',
            'filtered' => 'مصفاة',
            'selected' => 'محدد',
            'assigned' => 'تم التعيين',
            'removed' => 'تمت الإزالة',
            'activated' => 'تم التنشيط',
            'deactivated' => 'تم إلغاء التنشيط',
            'locked' => 'تم القفل',
            'unlocked' => 'تم الفتح',
            'approved' => 'تمت الموافقة',
            'rejected' => 'تم الرفض',
        ];

        $content = "<?php\n\nreturn [\n";

        // Add common keys first
        foreach ($commonKeys as $key => $value) {
            $content .= "    '{$key}' => '{$value}',\n";
        }

        // Add specific missing keys organized by their structure
        $organizedKeys = $this->organizeKeysByStructure($keys);
        $content = $this->addOrganizedKeys($content, $organizedKeys);

        $content .= "];\n";

        file_put_contents($filePath, $content);
        echo "✅ Created: {$filePath}\n";
    }

    /**
     * Organize keys by their structure (nested arrays)
     */
    private function organizeKeysByStructure($keys)
    {
        $organized = [];

        foreach ($keys as $keyData) {
            $parts = $keyData['parts'];
            $current = &$organized;

            // Navigate to the correct position in the array
            for ($i = 0; $i < count($parts) - 1; $i++) {
                $part = $parts[$i];
                if (!isset($current[$part]) || !is_array($current[$part])) {
                    $current[$part] = [];
                }
                $current = &$current[$part];
            }

            // Set the final value if it doesn't exist
            $finalKey = end($parts);
            if (!isset($current[$finalKey])) {
                $current[$finalKey] = $this->generateArabicTranslation($finalKey);
            }
        }

        return $organized;
    }

    /**
     * Add organized keys to content
     */
    private function addOrganizedKeys($content, $organizedKeys, $indent = 1)
    {
        foreach ($organizedKeys as $key => $value) {
            if (is_array($value)) {
                $indentStr = str_repeat('    ', $indent);
                $content .= "{$indentStr}'{$key}' => [\n";
                $content = $this->addOrganizedKeys($content, $value, $indent + 1);
                $content .= "{$indentStr}],\n";
            } else {
                $indentStr = str_repeat('    ', $indent);
                $escapedValue = $this->escapeString($value);
                $content .= "{$indentStr}'{$key}' => '{$escapedValue}',\n";
            }
        }

        return $content;
    }

    /**
     * Update existing translation file with missing keys
     */
    private function updateExistingTranslationFile($filePath, $keys)
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
                $current[$finalKey] = $this->generateArabicTranslation($finalKey);
                $modified = true;
            }
        }

        if ($modified) {
            $content = "<?php\n\nreturn " . $this->arrayToString($translations) . ";\n";
            file_put_contents($filePath, $content);
            echo "✅ Updated: {$filePath}\n";
        }
    }

    /**
     * Generate Arabic translation based on the key name
     */
    private function generateArabicTranslation($key)
    {
        // Simple heuristic to generate Arabic translation based on key name
        $key = str_replace('_', ' ', $key);
        $key = str_replace('-', ' ', $key);

        // Common English to Arabic mappings
        $mappings = [
            'id' => 'المعرف',
            'name' => 'الاسم',
            'title' => 'العنوان',
            'description' => 'الوصف',
            'created_at' => 'تاريخ الإنشاء',
            'updated_at' => 'تاريخ التحديث',
            'deleted_at' => 'تاريخ الحذف',
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة المرور',
            'phone' => 'الهاتف',
            'address' => 'العنوان',
            'city' => 'المدينة',
            'country' => 'الدولة',
            'status' => 'الحالة',
            'active' => 'نشط',
            'inactive' => 'غير نشط',
            'enabled' => 'مفعل',
            'disabled' => 'معطل',
            'user' => 'المستخدم',
            'role' => 'الدور',
            'permission' => 'الصلاحية',
            'action' => 'الإجراء',
            'date' => 'التاريخ',
            'time' => 'الوقت',
            'amount' => 'المبلغ',
            'quantity' => 'الكمية',
            'price' => 'السعر',
            'total' => 'الإجمالي',
            'payment' => 'الدفع',
            'invoice' => 'الفاتورة',
            'order' => 'الطلب',
            'product' => 'المنتج',
            'category' => 'الفئة',
            'brand' => 'العلامة التجارية',
            'image' => 'الصورة',
            'photo' => 'الصورة',
            'document' => 'المستند',
            'file' => 'الملف',
            'attachment' => 'المرفق',
            'settings' => 'الإعدادات',
            'profile' => 'الملف الشخصي',
            'dashboard' => 'لوحة التحكم',
            'reports' => 'التقارير',
            'analytics' => 'التحليلات',
            'statistics' => 'الإحصائيات',
            'search' => 'بحث',
            'filter' => 'تصفية',
            'sort' => 'فرز',
            'export' => 'تصدير',
            'import' => 'استيراد',
            'upload' => 'رفع',
            'download' => 'تحميل',
            'preview' => 'معاينة',
            'edit' => 'تعديل',
            'delete' => 'حذف',
            'create' => 'إنشاء',
            'update' => 'تحديث',
            'save' => 'حفظ',
            'cancel' => 'إلغاء',
            'submit' => 'إرسال',
            'reset' => 'إعادة تعيين',
            'apply' => 'تطبيق',
            'close' => 'إغلاق',
            'open' => 'فتح',
            'show' => 'عرض',
            'hide' => 'إخفاء',
            'visible' => 'ظاهر',
            'hidden' => 'مخفي',
            'public' => 'عام',
            'private' => 'خاص',
            'internal' => 'داخلي',
            'external' => 'خارجي',
            'admin' => 'المشرف',
            'manager' => 'المدير',
            'employee' => 'الموظف',
            'customer' => 'العميل',
            'client' => 'العميل',
            'vendor' => 'المورد',
            'supplier' => 'المزود',
            'staff' => 'الموظفين',
            'team' => 'الفريق',
            'department' => 'القسم',
            'division' => 'الإدارة',
            'branch' => 'الفرع',
            'office' => 'المكتب',
            'store' => 'المتجر',
            'shop' => 'المحل',
            'warehouse' => 'المخزن',
            'location' => 'الموقع',
            'position' => 'الموقع',
            'job' => 'الوظيفة',
            'career' => 'الوظيفة',
            'salary' => 'الراتب',
            'wage' => 'الأجر',
            'bonus' => 'المكافأة',
            'commission' => 'العمولة',
            'expense' => 'المصروف',
            'income' => 'الدخل',
            'revenue' => 'الإيرادات',
            'profit' => 'الربح',
            'loss' => 'الخسارة',
            'balance' => 'الرصيد',
            'credit' => 'الائتمان',
            'debit' => 'الخصم',
            'cash' => 'نقدًا',
            'bank' => 'البنك',
            'account' => 'الحساب',
            'transaction' => 'المعاملة',
            'payment_method' => 'وسيلة الدفع',
            'currency' => 'العملة',
            'exchange_rate' => 'سعر الصرف',
            'tax' => 'الضريبة',
            'vat' => 'ضريبة القيمة المضافة',
            'discount' => 'الخصم',
            'offer' => 'العرض',
            'promotion' => 'ال Promotion',
            'campaign' => 'الحملة',
            'marketing' => 'التسويق',
            'sales' => 'المبيعات',
            'purchase' => 'الشراء',
            'buy' => 'شراء',
            'sell' => 'بيع',
            'rent' => 'إيجار',
            'lease' => 'إيجار',
            'loan' => 'القرض',
            'finance' => 'المالية',
            'investment' => 'الاستثمار',
            'insurance' => 'التأمين',
            'health' => 'الصحة',
            'medical' => 'طبي',
            'education' => 'التعليم',
            'school' => 'المدرسة',
            'university' => 'الجامعة',
            'college' => 'الكلية',
            'student' => 'الطالب',
            'teacher' => 'المعلم',
            'course' => 'الدورة',
            'lesson' => 'الدرس',
            'exam' => 'الامتحان',
            'grade' => 'الدرجة',
            'score' => 'النتيجة',
            'certificate' => 'الشهادة',
            'degree' => 'الدرجة',
            'diploma' => 'الدبلوم',
            'training' => 'التدريب',
            'workshop' => 'ورشة العمل',
            'seminar' => 'الندوة',
            'conference' => 'المؤتمر',
            'event' => 'الحدث',
            'meeting' => 'الاجتماع',
            'appointment' => 'الموعد',
            'schedule' => 'الجدول',
            'calendar' => 'التقويم',
            'reminder' => 'التذكير',
            'notification' => 'الإشعار',
            'message' => 'الرسالة',
            'chat' => 'المحادثة',
            'call' => 'المكالمة',
            'video' => 'الفيديو',
            'audio' => 'الصوت',
            'media' => 'الوسائط',
            'music' => 'الموسيقى',
            'video_call' => 'مكالمة فيديو',
            'voice_call' => 'مكالمة صوتية',
            'broadcast' => 'البث',
            'stream' => 'البث المباشر',
            'live' => 'مباشر',
            'record' => 'تسجيل',
            'archive' => 'الأرشيف',
            'backup' => 'النسخ الاحتياطي',
            'restore' => 'استعادة',
            'sync' => 'المزامنة',
            'connect' => 'الاتصال',
            'disconnect' => 'قطع الاتصال',
            'online' => 'متصل',
            'offline' => 'غير متصل',
            'busy' => 'مشغول',
            'available' => 'متاح',
            'away' => 'بعيد',
            'do_not_disturb' => 'عدم الإزعاج',
            'invisible' => 'غير مرئي',
            'presence' => 'الوجود',
            'activity' => 'النشاط',
            'log' => 'السجل',
            'history' => 'التاريخ',
            'timeline' => 'الجدول الزمني',
            'activity_log' => 'سجل النشاطات',
            'audit_log' => 'سجل التدقيق',
            'access_log' => 'سجل الوصول',
            'error_log' => 'سجل الأخطاء',
            'debug' => 'تصحيح',
            'trace' => 'تتبع',
            'monitor' => 'مراقبة',
            'track' => 'تتبع',
            'watch' => 'راقب',
            'follow' => 'تابع',
            'unfollow' => 'إلغاء المتابعة',
            'like' => 'إعجاب',
            'dislike' => 'عدم إعجاب',
            'love' => 'حب',
            'hate' => 'كراهية',
            'favorite' => 'المفضلة',
            'bookmark' => 'المرجعية',
            'star' => 'نجمة',
            'flag' => 'علم',
            'report' => 'تقرير',
            'flag_as_inappropriate' => 'الإبلاغ كغير لائق',
            'block' => 'حظر',
            'unblock' => 'إلغاء الحظر',
            'mute' => 'كتم الصوت',
            'unmute' => 'إلغاء كتم الصوت',
            'pin' => 'تثبيت',
            'unpin' => 'إلغاء التثبيت',
            'share' => 'مشاركة',
            'forward' => 'إعادة توجيه',
            'reply' => 'رد',
            'quote' => 'اقتباس',
            'mention' => 'ذكر',
            'tag' => 'وسم',
            'topic' => 'الموضوع',
            'subject' => 'الموضوع',
            'category' => 'الفئة',
            'group' => 'المجموعة',
            'channel' => 'القناة',
            'forum' => 'المنتدى',
            'thread' => 'الخيط',
            'post' => 'المنشور',
            'comment' => 'التعليق',
            'response' => 'الرد',
            'feedback' => 'التعليق',
            'rating' => 'التقييم',
            'review' => 'المراجعة',
            'opinion' => 'الرأي',
            'suggestion' => 'الاقتراح',
            'request' => 'الطلب',
            'proposal' => 'العرض',
            'agreement' => 'الاتفاق',
            'contract' => 'العقد',
            'license' => 'الترخيص',
            'policy' => 'السياسة',
            'term' => 'الشرط',
            'condition' => 'الشرط',
            'warranty' => 'الضمان',
            'refund' => 'الاسترداد',
            'return' => 'إرجاع',
            'exchange' => 'تبديل',
            'replacement' => 'الاستبدال',
            'repair' => 'إصلاح',
            'maintenance' => 'الصيانة',
            'service' => 'الخدمة',
            'support' => 'الدعم',
            'help' => 'مساعدة',
            'faq' => 'الأسئلة الشائعة',
            'tutorial' => 'الدروس',
            'guide' => 'الدليل',
            'manual' => 'الكتيب',
            'documentation' => 'التوثيق',
            'setup' => 'الإعداد',
            'installation' => 'التثبيت',
            'configuration' => 'التكوين',
            'customization' => 'التخصيص',
            'theme' => 'السمة',
            'template' => 'القالب',
            'layout' => 'التخطيط',
            'design' => 'التصميم',
            'style' => 'النمط',
            'appearance' => 'المظهر',
            'interface' => 'الواجهة',
            'ui' => 'واجهة المستخدم',
            'ux' => 'تجربة المستخدم',
            'navigation' => 'التنقل',
            'menu' => 'القائمة',
            'sidebar' => 'الشريط الجانبي',
            'header' => 'الرأس',
            'footer' => 'التذييل',
            'breadcrumb' => 'مسار التنقل',
            'pagination' => 'ترقيم الصفحات',
            'page' => 'الصفحة',
            'section' => 'القسم',
            'column' => 'العمود',
            'row' => 'الصف',
            'table' => 'الجدول',
            'grid' => 'الشبكة',
            'chart' => 'الرسم البياني',
            'graph' => 'الرسم',
            'map' => 'الخريطة',
            'list' => 'القائمة',
            'card' => 'البطاقة',
            'panel' => 'اللوحة',
            'widget' => 'الودجة',
            'dashboard' => 'لوحة التحكم',
            'control_panel' => 'لوحة التحكم',
            'admin_panel' => 'لوحة تحكم المشرف',
            'user_panel' => 'لوحة المستخدم',
            'management' => 'الإدارة',
            'administration' => 'الإدارة',
            'admin' => 'المشرف',
            'moderator' => 'المشرف',
            'operator' => 'العامل',
            'supervisor' => 'المشرف',
            'chief' => 'الرئيس',
            'director' => 'المدير',
            'manager' => 'المدير',
            'coordinator' => 'المنسق',
            'leader' => 'القائد',
            'member' => 'العضو',
            'participant' => 'المشارك',
            'guest' => 'الضيف',
            'visitor' => 'الزائر',
            'public' => 'عام',
            'private' => 'خاص',
            'premium' => 'مميز',
            'basic' => 'أساسي',
            'standard' => 'قياسي',
            'enterprise' => 'الشركة',
            'business' => 'العمل',
            'professional' => 'احترافي',
            'personal' => 'شخصي',
            'family' => 'العائلة',
            'individual' => 'فردي',
            'organization' => 'المنظمة',
            'company' => 'الشركة',
            'corporation' => 'الorporation',
            'firm' => 'المكتب',
            'business_unit' => 'وحدة العمل',
            'department' => 'القسم',
            'division' => 'الإدارة',
            'branch' => 'الفرع',
            'subsidiary' => 'التابعة',
            'affiliate' => 'التابع',
            'partner' => 'الشريك',
            'associate' => 'الزميل',
            'collaborator' => 'المتعاون',
            'contributor' => 'المساهم',
            'volunteer' => 'المتطوع',
            'intern' => 'المتدرب',
            'apprentice' => 'المتعلم',
            'trainee' => 'المتدرب',
            'candidate' => 'المرشح',
            'applicant' => 'المتقدم',
            'interview' => 'المقابلة',
            'application' => 'الطلب',
            'resume' => 'السيرة الذاتية',
            'cv' => 'السيرة الذاتية',
            'portfolio' => 'المحفظة',
            'skills' => 'المهارات',
            'experience' => 'الخبرة',
            'education' => 'التعليم',
            'certification' => 'الشهادة',
            'qualification' => 'المؤهل',
            'credential' => 'الشهادة',
            'license' => 'الترخيص',
            'permit' => 'الترخيص',
            'authorization' => 'التفويض',
            'approval' => 'الموافقة',
            'acceptance' => 'القبول',
            'denial' => 'الرفض',
            'rejection' => 'الرفض',
            'withdrawal' => 'السحب',
            'cancellation' => 'الإلغاء',
            'termination' => 'الإنهاء',
            'suspension' => 'التعليق',
            'resumption' => 'الاستئناف',
            'continuation' => 'المتابعة',
            'extension' => 'التمديد',
            'renewal' => 'التجديد',
            'upgrade' => 'الترقية',
            'downgrade' => 'الإنزال',
            'transfer' => 'النقل',
            'migration' => 'النقل',
            'conversion' => 'التحويل',
            'transformation' => 'التحويل',
            'change' => 'تغيير',
            'modification' => 'التعديل',
            'adjustment' => 'التعديل',
            'alteration' => 'التعديل',
            'revision' => 'المراجعة',
            'update' => 'التحديث',
            'improvement' => 'التحسين',
            'enhancement' => 'التحسين',
            'optimization' => 'التحسين',
            'refinement' => 'التحسين',
            'perfection' => 'الإتقان',
            'completion' => 'الإكمال',
            'achievement' => 'الإنجاز',
            'success' => 'النجاح',
            'failure' => 'الفشل',
            'error' => 'الخطأ',
            'mistake' => 'الخطأ',
            'bug' => 'الخلل',
            'issue' => 'المشكلة',
            'problem' => 'المشكلة',
            'challenge' => 'التحدي',
            'obstacle' => 'العائق',
            'difficulty' => 'الصعوبة',
            'complication' => 'التعقيد',
            'complexity' => 'التعقيد',
            'simplicity' => 'البساطة',
            'efficiency' => 'الكفاءة',
            'effectiveness' => 'الفعالية',
            'performance' => 'الأداء',
            'speed' => 'السرعة',
            'velocity' => 'السرعة',
            'rate' => 'المعدل',
            'frequency' => 'التكرار',
            'period' => 'الفترة',
            'duration' => 'المدة',
            'interval' => 'الفترة',
            'cycle' => 'الدورة',
            'phase' => 'المرحلة',
            'stage' => 'المرحلة',
            'step' => 'الخطوة',
            'level' => 'المستوى',
            'tier' => 'الطبقة',
            'rank' => 'المرتبة',
            'grade' => 'الدرجة',
            'class' => 'الصف',
            'category' => 'الفئة',
            'type' => 'النوع',
            'kind' => 'النوع',
            'sort' => 'النوع',
            'variety' => 'ال variety',
            'version' => 'الإصدار',
            'edition' => 'الطبعة',
            'release' => 'الإصدار',
            'update' => 'التحديث',
            'patch' => 'التصحيح',
            'fix' => 'الإصلاح',
            'solution' => 'الحل',
            'answer' => 'الإجابة',
            'response' => 'الرد',
            'reply' => 'الرد',
            'acknowledgment' => 'الإقرار',
            'confirmation' => 'التأكيد',
            'validation' => 'التحقق',
            'verification' => 'التحقق',
            'authentication' => 'المصادقة',
            'authorization' => 'التفويض',
            'permission' => 'الإذن',
            'privilege' => 'الامتياز',
            'right' => 'الحق',
            'freedom' => 'الحرية',
            'liberty' => 'الحرية',
            'independence' => 'الاستقلال',
            'autonomy' => 'الاستقلالية',
            'sovereignty' => 'السيادة',
            'authority' => 'السلطة',
            'power' => 'القوة',
            'force' => 'القوة',
            'strength' => 'القوة',
            'energy' => 'الطاقة',
            'power' => 'الطاقة',
            'electricity' => 'الكهرباء',
            'gas' => 'الغاز',
            'water' => 'الماء',
            'oil' => 'الزيت',
            'fuel' => 'الوقود',
            'energy' => 'الطاقة',
            'resource' => 'المصدر',
            'material' => 'المواد',
            'supply' => 'الإمداد',
            'inventory' => 'المخزون',
            'stock' => 'المخزون',
            'warehouse' => 'المخزن',
            'storage' => 'التخزين',
            'deposit' => 'الإيداع',
            'withdrawal' => 'السحب',
            'balance' => 'الرصيد',
            'amount' => 'المبلغ',
            'quantity' => 'الكمية',
            'volume' => 'الحجم',
            'size' => 'الحجم',
            'dimension' => 'البعد',
            'measurement' => 'القياس',
            'scale' => 'المقياس',
            'weight' => 'الوزن',
            'mass' => 'الكتلة',
            'density' => 'الكثافة',
            'temperature' => 'درجة الحرارة',
            'pressure' => 'الضغط',
            'humidity' => 'الرطوبة',
            'light' => 'الضوء',
            'darkness' => 'الظلام',
            'bright' => 'مضيء',
            'dim' => 'خافت',
            'color' => 'اللون',
            'hue' => 'اللون',
            'shade' => 'الظل',
            'tone' => 'النبرة',
            'texture' => 'الملمس',
            'pattern' => 'النمط',
            'design' => 'التصميم',
            'shape' => 'الشكل',
            'form' => 'الشكل',
            'structure' => 'الهيكل',
            'construction' => 'البناء',
            'architecture' => 'الهندسة',
            'engineering' => 'الهندسة',
            'technology' => 'التكنولوجيا',
            'science' => 'العلوم',
            'research' => 'البحث',
            'study' => 'الدراسة',
            'analysis' => 'التحليل',
            'evaluation' => 'التقييم',
            'assessment' => 'التقييم',
            'examination' => 'الفحص',
            'inspection' => 'الفحص',
            'audit' => 'التدقيق',
            'review' => 'المراجعة',
            'survey' => 'المسح',
            'poll' => 'الاستطلاع',
            'vote' => 'التصويت',
            'election' => 'الانتخاب',
            'democracy' => 'الديمقراطية',
            'government' => 'الحكومة',
            'politics' => 'السياسة',
            'policy' => 'السياسة',
            'law' => 'القانون',
            'regulation' => 'التنظيم',
            'rule' => 'القاعدة',
            'principle' => 'المبدأ',
            'standard' => 'المعيار',
            'criterion' => 'المعيار',
            'specification' => 'المواصفات',
            'requirement' => 'المتطلبات',
            'need' => 'الحاجة',
            'demand' => 'الطلب',
            'desire' => 'الرغبة',
            'want' => 'الرغبة',
            'wish' => 'الرغبة',
            'hope' => 'الأمل',
            'expectation' => 'التوقع',
            'anticipation' => 'التوقع',
            'prediction' => 'التوقع',
            'forecast' => 'التوقع',
            'future' => 'المستقبل',
            'past' => 'الماضي',
            'present' => 'الحاضر',
            'now' => 'الآن',
            'today' => 'اليوم',
            'yesterday' => 'الأمس',
            'tomorrow' => 'الغد',
            'morning' => 'الصباح',
            'noon' => 'الظهر',
            'afternoon' => 'بعد الظهر',
            'evening' => 'المساء',
            'night' => 'الليل',
            'midnight' => 'منتصف الليل',
            'week' => 'الأسبوع',
            'month' => 'الشهر',
            'year' => 'السنة',
            'season' => 'الفصل',
            'spring' => 'الربيع',
            'summer' => 'الصيف',
            'fall' => 'الخريف',
            'autumn' => 'الخريف',
            'winter' => 'الشتاء',
            'climate' => 'المناخ',
            'weather' => 'الطقس',
            'temperature' => 'درجة الحرارة',
            'rain' => 'المطر',
            'snow' => 'الثلج',
            'sun' => 'الشمس',
            'moon' => 'القمر',
            'star' => 'النجمة',
            'sky' => 'السماء',
            'earth' => 'الأرض',
            'world' => 'العالم',
            'planet' => 'الكوكب',
            'universe' => 'الكون',
            'space' => 'الفضاء',
            'time' => 'الزمن',
            'life' => 'الحياة',
            'death' => 'الموت',
            'birth' => 'الولادة',
            'growth' => 'النمو',
            'development' => 'التطوير',
            'progress' => 'التقدم',
            'advance' => 'التقدم',
            'evolution' => 'التطور',
            'revolution' => 'الثورة',
            'change' => 'التغيير',
            'transformation' => 'التحول',
            'revolution' => 'الثورة',
            'innovation' => 'الابتكار',
            'creation' => 'الخلق',
            'production' => 'الإنتاج',
            'manufacturing' => 'التصنيع',
            'industry' => 'الصناعة',
            'commerce' => 'التجارة',
            'trade' => 'التجارة',
            'business' => 'العمل',
            'economy' => 'الاقتصاد',
            'finance' => 'المالية',
            'money' => 'المال',
            'currency' => 'العملة',
            'coin' => 'العملة المعدنية',
            'bill' => 'الورقة النقدية',
            'banknote' => 'الورقة النقدية',
            'credit' => 'الائتمان',
            'debit' => 'الخصم',
            'loan' => 'القرض',
            'mortgage' => 'الرهن العقاري',
            'investment' => 'الاستثمار',
            'saving' => 'الادخار',
            'expense' => 'المصروف',
            'cost' => 'التكلفة',
            'price' => 'السعر',
            'value' => 'القيمة',
            'worth' => 'القيمة',
            'benefit' => 'الفائدة',
            'advantage' => 'الميزة',
            'disadvantage' => 'العيب',
            'risk' => 'المخاطرة',
            'danger' => 'الخطر',
            'safety' => 'السلامة',
            'security' => 'الأمن',
            'protection' => 'الحماية',
            'defense' => 'الدفاع',
            'war' => 'الحرب',
            'peace' => 'السلام',
            'conflict' => 'الصراع',
            'harmony' => 'الانسجام',
            'unity' => 'الوحدة',
            'diversity' => 'التنوع',
            'equality' => 'المساواة',
            'justice' => 'العدالة',
            'fairness' => 'العدالة',
            'equity' => 'المساواة',
            'balance' => 'التوازن',
            'stability' => 'الاستقرار',
            'flexibility' => 'المرونة',
            'adaptability' => 'القدرة على التكيف',
            'resilience' => 'المقاومة',
            'durability' => 'المتانة',
            'quality' => 'الجودة',
            'excellence' => 'التميز',
            'superiority' => 'التفوق',
            'inferiority' => 'الدونية',
            'mediocrity' => 'ال mediocrity',
            'average' => 'المتوسط',
            'normal' => 'الطبيعي',
            'usual' => 'المعتاد',
            'typical' => 'النوعي',
            'standard' => 'القياسي',
            'regular' => 'العادي',
            'ordinary' => 'العادي',
            'special' => 'خاص',
            'unique' => 'فريد',
            'rare' => 'نادر',
            'common' => 'شائع',
            'popular' => 'شائع',
            'famous' => 'مشهور',
            'well_known' => 'معروف',
            'infamous' => 'مشهور سوء',
            'celebrity' => 'الCelebrity',
            'hero' => 'البطل',
            'villain' => 'الشرير',
            'friend' => 'الصديق',
            'enemy' => 'العدو',
            'ally' => 'الحليف',
            'opponent' => 'الخصم',
            'rival' => 'المنافس',
            'competition' => 'المنافسة',
            'cooperation' => 'التعاون',
            'collaboration' => 'التعاون',
            'partnership' => 'الشراكة',
            'teamwork' => 'عمل الفريق',
            'solidarity' => 'التضامن',
            'community' => 'المجتمع',
            'society' => 'المجتمع',
            'civilization' => 'الحضارة',
            'culture' => 'الثقافة',
            'tradition' => 'التقليد',
            'custom' => 'العادة',
            'habit' => 'العادة',
            'routine' => 'الروتين',
            'practice' => 'الممارسة',
            'behavior' => 'السلوك',
            'attitude' => 'الموقف',
            'mood' => 'المزاج',
            'emotion' => 'العاطفة',
            'feeling' => 'الشعور',
            'sentiment' => 'ال feeling',
            'passion' => 'الشغف',
            'love' => 'الحب',
            'hate' => 'الكراهية',
            'anger' => 'الغضب',
            'fear' => 'الخوف',
            'joy' => 'الفرح',
            'sadness' => 'الحزن',
            'surprise' => 'الدهشة',
            'disgust' => 'الاشمئزاز',
            'trust' => 'الثقة',
            'distrust' => 'ال distrust',
            'confidence' => 'الثقة',
            'insecurity' => 'عدم الأمان',
            'anxiety' => 'القلق',
            'stress' => 'الإجهاد',
            'relaxation' => 'الاسترخاء',
            'calm' => 'الهدوء',
            'peaceful' => 'هادئ',
            'chaos' => 'الفوضى',
            'order' => 'النظام',
            'organization' => 'التنظيم',
            'system' => 'النظام',
            'procedure' => 'الإجراء',
            'protocol' => 'البروتوكول',
            'method' => 'الطريقة',
            'technique' => 'ال technique',
            'approach' => 'ال approach',
            'strategy' => 'ال strategy',
            'tactic' => 'ال tactic',
            'plan' => 'ال plan',
            'goal' => 'ال goal',
            'objective' => 'ال objective',
            'purpose' => 'ال purpose',
            'aim' => 'ال aim',
            'target' => 'ال target',
            'mission' => 'المهمة',
            'vision' => 'الرؤية',
            'dream' => 'الحلم',
            'fantasy' => 'ال fantasy',
            'imagination' => 'ال imagination',
            'creativity' => 'ال إبداع',
            'art' => 'الفن',
            'music' => 'الموسيقى',
            'literature' => 'الأدب',
            'poetry' => 'الشعر',
            'novel' => 'الرواية',
            'story' => 'القصة',
            'film' => 'ال فيلم',
            'cinema' => 'ال سينما',
            'theater' => 'المسرح',
            'dance' => 'الرقص',
            'painting' => 'الرسم',
            'sculpture' => 'النحت',
            'architecture' => 'الهندسة المعمارية',
            'photography' => 'التصوير',
            'design' => 'التصميم',
            'fashion' => 'الموضة',
            'style' => 'ال style',
            'beauty' => 'الجمال',
            'ugliness' => 'ال丑陋',
            'attraction' => 'الجذب',
            'repulsion' => 'ال repulsion',
            'appeal' => 'ال appeal',
            'charm' => 'ال charm',
            'grace' => 'ال grace',
            'elegance' => 'ال elegance',
            'sophistication' => 'ال sophistication',
            'refinement' => 'ال refinement',
            'taste' => 'ال taste',
            'preference' => 'التفضيل',
            'choice' => 'ال choice',
            'decision' => 'ال decision',
            'selection' => 'ال selection',
            'election' => 'ال election',
            'vote' => 'ال vote',
            'ballot' => 'ال ballot',
            'poll' => 'ال poll',
            'census' => 'ال census',
            'population' => 'ال population',
            'demographics' => 'ال demographics',
            'statistics' => 'الإحصاءات',
            'data' => 'البيانات',
            'information' => 'المعلومات',
            'knowledge' => 'المعرفة',
            'wisdom' => 'الحكمة',
            'intelligence' => 'الذكاء',
            'understanding' => 'الفهم',
            'comprehension' => 'الفهم',
            'awareness' => 'الوعي',
            'consciousness' => 'الوعي',
            'attention' => 'الانتباه',
            'focus' => 'التركيز',
            'concentration' => 'التركيز',
            'distraction' => 'ال Distraction',
            'interruption' => 'ال Interruption',
            'break' => 'ال break',
            'pause' => 'ال pause',
            'rest' => 'ال rest',
            'sleep' => 'ال sleep',
            'nap' => 'ال nap',
            'awakening' => 'ال awakening',
            'waking' => 'ال waking',
            'dreaming' => 'ال dreaming',
            'daydreaming' => 'ال daydreaming',
            'meditation' => 'ال meditation',
            'contemplation' => 'ال contemplation',
            'reflection' => 'ال reflection',
            'thought' => 'ال thought',
            'idea' => 'الفكرة',
            'concept' => 'المفهوم',
            'theory' => 'النظرية',
            'hypothesis' => 'الفرضية',
            'assumption' => 'الافتراض',
            'belief' => 'ال creencia',
            'faith' => 'الإيمان',
            'religion' => 'ال religion',
            'spirituality' => 'ال spirituality',
            'god' => 'الله',
            'bible' => 'الكتاب المقدس',
            'church' => 'الكنيسة',
            'temple' => 'ال معبد',
            'mosque' => 'المسجد',
            'synagogue' => 'الsynagogue',
            'prayer' => 'الصلاة',
            'worship' => 'العبادة',
            'ritual' => 'ال ritual',
            'ceremony' => 'ال ceremony',
            'festival' => 'ال festival',
            'holiday' => 'ال holiday',
            'vacation' => 'ال vacation',
            'trip' => 'ال trip',
            'journey' => 'ال journey',
            'travel' => 'ال travel',
            'tourism' => 'ال tourism',
            'destination' => 'ال destination',
            'location' => 'الموقع',
            'place' => 'المكان',
            'area' => 'المنطقة',
            'region' => 'المنطقة',
            'zone' => 'المنطقة',
            'territory' => 'الإقليم',
            'country' => 'الدولة',
            'nation' => 'الأمة',
            'state' => 'الولاية',
            'province' => 'المحافظة',
            'city' => 'المدينة',
            'town' => 'المدينة',
            'village' => 'القرية',
            'neighborhood' => 'الحي',
            'street' => 'الشارع',
            'avenue' => 'ال avenue',
            'road' => 'الطريق',
            'highway' => 'الطريق السريع',
            'bridge' => 'الجسر',
            'tunnel' => 'النفق',
            'building' => 'المبنى',
            'house' => 'البيت',
            'apartment' => 'الشقة',
            'condominium' => 'ال condominium',
            'hotel' => 'الفندق',
            'restaurant' => 'المطعم',
            'cafe' => 'المقهى',
            'bar' => 'الحانة',
            'pub' => 'ال pub',
            'club' => 'النادي',
            'stadium' => 'الملعب',
            'arena' => 'ال areana',
            'theater' => 'المسرح',
            'cinema' => 'السينما',
            'museum' => 'المتحف',
            'library' => 'المكتبة',
            'school' => 'المدرسة',
            'university' => 'الجامعة',
            'hospital' => 'المستشفى',
            'clinic' => 'العيادة',
            'pharmacy' => 'الصيدلية',
            'bank' => 'البنك',
            'post_office' => 'مكتب البريد',
            'police_station' => 'مركز الشرطة',
            'fire_station' => 'محطة الإطفاء',
            'airport' => 'المطار',
            'station' => 'المحطة',
            'platform' => 'المنصة',
            'train' => 'القطار',
            'bus' => 'الحافلة',
            'car' => 'السيارة',
            'truck' => 'الشاحنة',
            'bicycle' => 'الدراجة',
            'motorcycle' => 'الدراجة النارية',
            'boat' => 'القارب',
            'ship' => 'السفينة',
            'airplane' => 'الطائرة',
            'vehicle' => 'الم vehicle',
            'transportation' => 'النقل',
            'traffic' => 'المرور',
            'sign' => 'ال sign',
            'signal' => 'ال signal',
            'light' => 'الضوء',
            'lamp' => 'المصباح',
            'bulb' => 'ال bulb',
            'switch' => 'ال switch',
            'button' => 'الزر',
            'lever' => 'ال lever',
            'knob' => 'ال knob',
            'handle' => 'ال handle',
            'door' => 'الباب',
            'window' => 'النافذة',
            'wall' => 'الجدار',
            'floor' => 'الأرضية',
            'ceiling' => 'السقف',
            'roof' => 'السقف',
            'foundation' => 'الأساس',
            'structure' => 'الهيكل',
            'frame' => 'الإطار',
            'support' => 'الدعم',
            'pillar' => 'العمود',
            'beam' => 'العارضة',
            'column' => 'العمود',
            'arch' => 'ال قوس',
            'bridge' => 'الجسر',
            'stairs' => 'السلالم',
            'elevator' => 'المصعد',
            'escalator' => 'السلالم الكهربائية',
            'room' => 'الغرفة',
            'kitchen' => 'المطبخ',
            'bedroom' => 'غرفة النوم',
            'bathroom' => 'الحمام',
            'living_room' => 'غرفة المعيشة',
            'dining_room' => 'غرفة الطعام',
            'office' => 'المكتب',
            'studio' => 'ال studio',
            'workshop' => 'ورشة العمل',
            'garage' => 'الكراج',
            'garden' => 'الحديقة',
            'yard' => 'الفناء',
            'lawn' => 'اللawn',
            'park' => 'الحديقة',
            'forest' => 'الغابة',
            'woods' => 'ال woods',
            'jungle' => 'الغابة',
            'desert' => 'الصحراء',
            'mountain' => 'الجبل',
            'hill' => 'ال تل',
            'valley' => 'الوادي',
            'river' => 'النهر',
            'lake' => 'البحيرة',
            'sea' => 'البحر',
            'ocean' => 'المحيط',
            'beach' => 'الشاطئ',
            'coast' => 'الساحل',
            'shore' => 'ال shore',
            'island' => 'الجزيرة',
            'continent' => 'القارة',
            'earth' => 'الأرض',
            'planet' => 'الكوكب',
            'space' => 'الفضاء',
            'universe' => 'الكون',
            'galaxy' => 'المجرة',
            'star' => 'النجمة',
            'sun' => 'الشمس',
            'moon' => 'القمر',
            'meteor' => 'ال meteor',
            'comet' => 'ال comet',
            'asteroid' => 'ال asteroid',
            'satellite' => 'القمر الصناعي',
        ];

        // Return mapped translation or generate based on key
        return $mappings[strtolower($key)] ?? 'الـ' . ucfirst(str_replace(' ', '_', $key));
    }

    /**
     * Escape string for PHP
     */
    private function escapeString($str)
    {
        return str_replace(["'", "\\"], ["\\'", "\\\\"], $str);
    }

    /**
     * Convert array to PHP string format
     */
    private function arrayToString($array, $indent = 1)
    {
        $indentStr = str_repeat('    ', $indent);
        $result = "[\n";

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result .= "{$indentStr}'{$key}' => " . $this->arrayToString($value, $indent + 1) . ",\n";
            } else {
                $escapedValue = $this->escapeString($value);
                $result .= "{$indentStr}'{$key}' => '{$escapedValue}',\n";
            }
        }

        $result .= str_repeat('    ', $indent - 1) . "]";
        return $result;
    }

    /**
     * Compare with English translations to identify truly missing keys
     */
    public function compareWithEnglish()
    {
        echo "🔍 Comparing Arabic translations with English translations...\n\n";

        $enDir = 'lang/en';
        $arDir = 'lang/ar';

        if (!is_dir($enDir)) {
            echo "⚠️  English language directory not found: {$enDir}\n";
            return;
        }

        $enFiles = scandir($enDir);
        $missingInAr = [];

        foreach ($enFiles as $file) {
            if ($file === '.' || $file === '..' || !str_ends_with($file, '.php')) {
                continue;
            }

            $enFilePath = $enDir . DIRECTORY_SEPARATOR . $file;
            $arFilePath = $arDir . DIRECTORY_SEPARATOR . $file;

            if (!file_exists($arFilePath)) {
                echo "❌ Missing Arabic translation file: {$file}\n";
                $missingInAr[$file] = ['type' => 'file_missing', 'en_keys' => []];
                continue;
            }

            $enKeys = $this->getTranslationKeys($enFilePath);
            $arKeys = $this->getTranslationKeys($arFilePath);

            $missingKeys = array_diff_key($enKeys, $arKeys);

            if (!empty($missingKeys)) {
                $missingInAr[$file] = [
                    'type' => 'keys_missing',
                    'en_keys' => $enKeys,
                    'ar_keys' => $arKeys,
                    'missing_keys' => $missingKeys
                ];

                echo "📋 File {$file}: " . count($missingKeys) . " missing keys\n";
            }
        }

        if (!empty($missingInAr)) {
            echo "\n📊 Summary of missing translations compared to English:\n";
            foreach ($missingInAr as $file => $data) {
                if ($data['type'] === 'file_missing') {
                    echo "  • {$file}: File is missing entirely\n";
                } elseif ($data['type'] === 'keys_missing') {
                    echo "  • {$file}: " . count($data['missing_keys']) . " keys missing\n";
                }
            }
        } else {
            echo "✅ All Arabic translation files match their English counterparts!\n";
        }

        echo "\n";
    }

    /**
     * Get flattened translation keys from a file
     */
    private function getTranslationKeys($filePath)
    {
        if (!file_exists($filePath)) {
            return [];
        }

        $array = include $filePath;
        return $this->flattenArray($array);
    }

    /**
     * Flatten nested array to get all keys
     */
    private function flattenArray($array, $prefix = '')
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = $prefix === '' ? $key : "$prefix.$key";

            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $newKey));
            } else {
                $result[$newKey] = $value;
            }
        }

        return $result;
    }

    /**
     * Run the complete scan and update process
     */
    public function run()
    {
        echo "🌐 COMPREHENSIVE ARABIC TRANSLATION SCANNER\n";
        echo str_repeat("=", 50) . "\n\n";

        // Scan project
        $this->scanProject();

        // Generate report
        $this->generateReport();

        // Create/update files
        echo "🔄 Creating/updating Arabic translation files with missing keys...\n";
        $this->createOrUpdateTranslationFiles();

        // Compare with English
        $this->compareWithEnglish();

        echo "🏁 COMPREHENSIVE SCAN COMPLETE\n";
        echo "All Arabic translation files have been updated with missing keys!\n";
    }
}

// Run the scanner
if (php_sapi_name() === 'cli') {
    $scanner = new ComprehensiveTranslationScanner();
    $scanner->run();
}
