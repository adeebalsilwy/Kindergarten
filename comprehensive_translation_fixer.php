<?php

/**
 * Comprehensive Translation Fixer
 *
 * This script addresses all remaining missing translation keys in the project
 * with professional Arabic and English translations
 */

class ComprehensiveTranslationFixer
{
    private $projectRoot;
    private $langPath;

    // Remaining missing keys with professional translations
    private $translations = [
        // Class Enrollments
        'class_enrollments.confirm_action' => [
            'en' => 'Are you sure you want to perform this action?',
            'ar' => 'هل أنت متأكد من تنفيذ هذا الإجراء؟'
        ],
        'class_enrollments.selected_enrollments' => [
            'en' => 'Selected enrollments?',
            'ar' => 'تسجيلات محددة؟'
        ],
        'class_enrollments.confirm' => [
            'en' => 'Confirm',
            'ar' => 'تأكيد'
        ],
        'class_enrollments.select_enrollments_first' => [
            'en' => 'Please select enrollments first',
            'ar' => 'الرجاء تحديد تسجيلات أولاً'
        ],
        'class_enrollments.new_status' => [
            'en' => 'New status',
            'ar' => 'الحالة الجديدة'
        ],
        'class_enrollments.delete_selected' => [
            'en' => 'Selected enrollments will be permanently deleted. Are you sure?',
            'ar' => 'سيتم حذف التسجيلات المحددة نهائياً. هل أنت متأكد؟'
        ],
        'class_enrollments.confirm_delete_multiple' => [
            'en' => 'Are you sure you want to delete the selected enrollments? This action cannot be undone.',
            'ar' => 'هل أنت متأكد من حذف التسجيلات المحددة؟ لا يمكن التراجع عن هذا الإجراء.'
        ],
        'class_enrollments.bulk_action_success' => [
            'en' => 'Bulk action executed successfully',
            'ar' => 'تم تنفيذ الإجراء الجماعي بنجاح'
        ],
        'class_enrollments.select_at_least_one' => [
            'en' => 'Please select at least one enrollment',
            'ar' => 'الرجاء تحديد تسجيل واحد على الأقل'
        ],
        'class_enrollments.action_completed' => [
            'en' => 'Action completed successfully',
            'ar' => 'اكتمل الإجراء بنجاح'
        ],

        // Test Model
        'TestModel.add_new' => [
            'en' => 'Add New Test Model',
            'ar' => 'إضافة نموذج اختبار جديد'
        ],
        'TestModel.edit' => [
            'en' => 'Edit Test Model',
            'ar' => 'تعديل نموذج الاختبار'
        ],
        'TestModel.title' => [
            'en' => 'Test Model',
            'ar' => 'نموذج الاختبار'
        ],
        'TestModel.list' => [
            'en' => 'Test Model List',
            'ar' => 'قائمة نماذج الاختبار'
        ],
        'TestModel.show' => [
            'en' => 'Show Test Model',
            'ar' => 'عرض نموذج الاختبار'
        ],

        // User related keys
        'User.add_new' => [
            'en' => 'Add New User',
            'ar' => 'إضافة مستخدم جديد'
        ],
        'User.edit' => [
            'en' => 'Edit User',
            'ar' => 'تعديل المستخدم'
        ],
        'User.title' => [
            'en' => 'User',
            'ar' => 'المستخدم'
        ],
        'User.list' => [
            'en' => 'User List',
            'ar' => 'قائمة المستخدمين'
        ],
        'User.details' => [
            'en' => 'User Details',
            'ar' => 'تفاصيل المستخدم'
        ],

        // User placeholders and fields
        'users.placeholders.name' => [
            'en' => 'Enter name',
            'ar' => 'أدخل الاسم'
        ],
        'users.placeholders.email' => [
            'en' => 'Enter email',
            'ar' => 'أدخل البريد الإلكتروني'
        ],
        'users.placeholders.phone' => [
            'en' => 'Enter phone number',
            'ar' => 'أدخل رقم الهاتف'
        ],
        'users.placeholders.password' => [
            'en' => 'Enter password',
            'ar' => 'أدخل كلمة المرور'
        ],
        'users.placeholders.password_confirmation' => [
            'en' => 'Confirm password',
            'ar' => 'تأكيد كلمة المرور'
        ],
        'users.departments.administration' => [
            'en' => 'Administration',
            'ar' => 'الإدارة'
        ],
        'users.departments.teaching' => [
            'en' => 'Teaching',
            'ar' => 'التدريس'
        ],
        'users.departments.finance' => [
            'en' => 'Finance',
            'ar' => 'الشؤون المالية'
        ],
        'users.departments.support' => [
            'en' => 'Support',
            'ar' => 'الدعم'
        ],
        'users.fields.send_welcome_email' => [
            'en' => 'Send Welcome Email',
            'ar' => 'إرسال بريد ترحيبي'
        ],
        'users.fields.send_notification' => [
            'en' => 'Send Notification',
            'ar' => 'إرسال إشعار'
        ],
        'users.fields.user_agent' => [
            'en' => 'User Agent',
            'ar' => 'عميل المستخدم'
        ],
        'users.help.password_update' => [
            'en' => 'Leave empty to keep current password',
            'ar' => 'اتركه فارغاً للحفاظ على كلمة المرور الحالية'
        ],

        // Access control filters
        'From' => [
            'en' => 'From',
            'ar' => 'من'
        ],
        'To' => [
            'en' => 'To',
            'ar' => 'إلى'
        ],
        'Min' => [
            'en' => 'Min',
            'ar' => 'الحد الأدنى'
        ],
        'Max' => [
            'en' => 'Max',
            'ar' => 'الحد الأعلى'
        ],

        // Additional missing keys from various categories
        'AccountingEntry.add_new' => [
            'en' => 'Add New Accounting Entry',
            'ar' => 'إضافة مدخل محاسبي جديد'
        ],
        'AccountingEntry.edit' => [
            'en' => 'Edit Accounting Entry',
            'ar' => 'تعديل المدخل المحاسبي'
        ],
        'AccountingEntry.title' => [
            'en' => 'Accounting Entry',
            'ar' => 'المدخل المحاسبي'
        ],
        'AccountingEntry.list' => [
            'en' => 'Accounting Entries',
            'ar' => 'المدخلات المحاسبية'
        ],
        'AccountingEntry.show' => [
            'en' => 'Show Accounting Entry',
            'ar' => 'عرض المدخل المحاسبي'
        ],

        'Activity.add_new' => [
            'en' => 'Add New Activity',
            'ar' => 'إضافة نشاط جديد'
        ],
        'Activity.edit' => [
            'en' => 'Edit Activity',
            'ar' => 'تعديل النشاط'
        ],
        'Activity.title' => [
            'en' => 'Activity',
            'ar' => 'النشاط'
        ],
        'Activity.list' => [
            'en' => 'Activities',
            'ar' => 'الأنشطة'
        ],
        'Activity.show' => [
            'en' => 'Show Activity',
            'ar' => 'عرض النشاط'
        ],

        'Attendance.add_new' => [
            'en' => 'Add New Attendance',
            'ar' => 'إضافة حضور جديد'
        ],
        'Attendance.edit' => [
            'en' => 'Edit Attendance',
            'ar' => 'تعديل الحضور'
        ],
        'Attendance.title' => [
            'en' => 'Attendance',
            'ar' => 'الحضور'
        ],
        'Attendance.list' => [
            'en' => 'Attendances',
            'ar' => 'الحضور'
        ],
        'Attendance.show' => [
            'en' => 'Show Attendance',
            'ar' => 'عرض الحضور'
        ],

        'Cache.add_new' => [
            'en' => 'Add New Cache',
            'ar' => 'إضافة ذاكرة مؤقتة جديدة'
        ],
        'Cache.edit' => [
            'en' => 'Edit Cache',
            'ar' => 'تعديل الذاكرة المؤقتة'
        ],
        'Cache.title' => [
            'en' => 'Cache',
            'ar' => 'الذاكرة المؤقتة'
        ],
        'Cache.list' => [
            'en' => 'Caches',
            'ar' => 'الذاكرات المؤقتة'
        ],
        'Cache.show' => [
            'en' => 'Show Cache',
            'ar' => 'عرض الذاكرة المؤقتة'
        ],

        'Children.add_new' => [
            'en' => 'Add New Child',
            'ar' => 'إضافة طفل جديد'
        ],
        'Children.edit' => [
            'en' => 'Edit Child',
            'ar' => 'تعديل الطفل'
        ],
        'Children.title' => [
            'en' => 'Child',
            'ar' => 'الطفل'
        ],
        'Children.list' => [
            'en' => 'Children',
            'ar' => 'الأطفال'
        ],
        'Children.show' => [
            'en' => 'Show Child',
            'ar' => 'عرض الطفل'
        ],

        'Class.add_new' => [
            'en' => 'Add New Class',
            'ar' => 'إضافة فصل جديد'
        ],
        'Class.edit' => [
            'en' => 'Edit Class',
            'ar' => 'تعديل الفصل'
        ],
        'Class.title' => [
            'en' => 'Class',
            'ar' => 'الفصل'
        ],
        'Class.list' => [
            'en' => 'Classes',
            'ar' => 'الفصول'
        ],
        'Class.show' => [
            'en' => 'Show Class',
            'ar' => 'عرض الفصل'
        ],

        'CommandLog.add_new' => [
            'en' => 'Add New Command Log',
            'ar' => 'إضافة سجل أوامر جديد'
        ],
        'CommandLog.edit' => [
            'en' => 'Edit Command Log',
            'ar' => 'تعديل سجل الأوامر'
        ],
        'CommandLog.title' => [
            'en' => 'Command Log',
            'ar' => 'سجل الأوامر'
        ],
        'CommandLog.list' => [
            'en' => 'Command Logs',
            'ar' => 'سجلات الأوامر'
        ],
        'CommandLog.show' => [
            'en' => 'Show Command Log',
            'ar' => 'عرض سجل الأوامر'
        ],

        'Curriculum.add_new' => [
            'en' => 'Add New Curriculum',
            'ar' => 'إضافة منهج جديد'
        ],
        'Curriculum.edit' => [
            'en' => 'Edit Curriculum',
            'ar' => 'تعديل المنهج'
        ],
        'Curriculum.title' => [
            'en' => 'Curriculum',
            'ar' => 'المنهج'
        ],
        'Curriculum.list' => [
            'en' => 'Curricula',
            'ar' => 'المناهج'
        ],
        'Curriculum.show' => [
            'en' => 'Show Curriculum',
            'ar' => 'عرض المنهج'
        ],

        'DashboardContent.add_new' => [
            'en' => 'Add New Dashboard Content',
            'ar' => 'إضافة محتوى لوحة التحكم جديد'
        ],
        'DashboardContent.edit' => [
            'en' => 'Edit Dashboard Content',
            'ar' => 'تعديل محتوى لوحة التحكم'
        ],
        'DashboardContent.title' => [
            'en' => 'Dashboard Content',
            'ar' => 'محتوى لوحة التحكم'
        ],
        'DashboardContent.list' => [
            'en' => 'Dashboard Contents',
            'ar' => 'محتويات لوحة التحكم'
        ],
        'DashboardContent.show' => [
            'en' => 'Show Dashboard Content',
            'ar' => 'عرض محتوى لوحة التحكم'
        ],

        'Event.add_new' => [
            'en' => 'Add New Event',
            'ar' => 'إضافة حدث جديد'
        ],
        'Event.edit' => [
            'en' => 'Edit Event',
            'ar' => 'تعديل الحدث'
        ],
        'Event.title' => [
            'en' => 'Event',
            'ar' => 'الحدث'
        ],
        'Event.list' => [
            'en' => 'Events',
            'ar' => 'الأحداث'
        ],
        'Event.show' => [
            'en' => 'Show Event',
            'ar' => 'عرض الحدث'
        ],

        'Expense.add_new' => [
            'en' => 'Add New Expense',
            'ar' => 'إضافة مصروف جديد'
        ],
        'Expense.edit' => [
            'en' => 'Edit Expense',
            'ar' => 'تعديل المصروف'
        ],
        'Expense.title' => [
            'en' => 'Expense',
            'ar' => 'المصروف'
        ],
        'Expense.list' => [
            'en' => 'Expenses',
            'ar' => 'المصروفات'
        ],
        'Expense.show' => [
            'en' => 'Show Expense',
            'ar' => 'عرض المصروف'
        ],

        'Fee.add_new' => [
            'en' => 'Add New Fee',
            'ar' => 'إضافة رسوم جديدة'
        ],
        'Fee.edit' => [
            'en' => 'Edit Fee',
            'ar' => 'تعديل الرسوم'
        ],
        'Fee.title' => [
            'en' => 'Fee',
            'ar' => 'الرسوم'
        ],
        'Fee.list' => [
            'en' => 'Fees',
            'ar' => 'الرسوم'
        ],
        'Fee.show' => [
            'en' => 'Show Fee',
            'ar' => 'عرض الرسوم'
        ],

        'FinancialReport.add_new' => [
            'en' => 'Add New Financial Report',
            'ar' => 'إضافة تقرير مالي جديد'
        ],
        'FinancialReport.edit' => [
            'en' => 'Edit Financial Report',
            'ar' => 'تعديل التقرير المالي'
        ],
        'FinancialReport.title' => [
            'en' => 'Financial Report',
            'ar' => 'التقرير المالي'
        ],
        'FinancialReport.list' => [
            'en' => 'Financial Reports',
            'ar' => 'التقارير المالية'
        ],
        'FinancialReport.show' => [
            'en' => 'Show Financial Report',
            'ar' => 'عرض التقرير المالي'
        ],

        'Grade.add_new' => [
            'en' => 'Add New Grade',
            'ar' => 'إضافة درجة جديدة'
        ],
        'Grade.edit' => [
            'en' => 'Edit Grade',
            'ar' => 'تعديل الدرجة'
        ],
        'Grade.title' => [
            'en' => 'Grade',
            'ar' => 'الدرجة'
        ],
        'Grade.list' => [
            'en' => 'Grades',
            'ar' => 'الدرجات'
        ],
        'Grade.show' => [
            'en' => 'Show Grade',
            'ar' => 'عرض الدرجة'
        ],

        'Guardian.add_new' => [
            'en' => 'Add New Guardian',
            'ar' => 'إضافة ولي أمر جديد'
        ],
        'Guardian.edit' => [
            'en' => 'Edit Guardian',
            'ar' => 'تعديل ولي الأمر'
        ],
        'Guardian.title' => [
            'en' => 'Guardian',
            'ar' => 'ولي الأمر'
        ],
        'Guardian.list' => [
            'en' => 'Guardians',
            'ar' => 'أولياء الأمور'
        ],
        'Guardian.show' => [
            'en' => 'Show Guardian',
            'ar' => 'عرض ولي الأمر'
        ],

        'Job.add_new' => [
            'en' => 'Add New Job',
            'ar' => 'إضافة وظيفة جديدة'
        ],
        'Job.edit' => [
            'en' => 'Edit Job',
            'ar' => 'تعديل الوظيفة'
        ],
        'Job.title' => [
            'en' => 'Job',
            'ar' => 'الوظيفة'
        ],
        'Job.list' => [
            'en' => 'Jobs',
            'ar' => 'الوظائف'
        ],
        'Job.show' => [
            'en' => 'Show Job',
            'ar' => 'عرض الوظيفة'
        ],

        'Language.add_new' => [
            'en' => 'Add New Language',
            'ar' => 'إضافة لغة جديدة'
        ],
        'Language.edit' => [
            'en' => 'Edit Language',
            'ar' => 'تعديل اللغة'
        ],
        'Language.title' => [
            'en' => 'Language',
            'ar' => 'اللغة'
        ],
        'Language.list' => [
            'en' => 'Languages',
            'ar' => 'اللغات'
        ],
        'Language.show' => [
            'en' => 'Show Language',
            'ar' => 'عرض اللغة'
        ],

        'Material.add_new' => [
            'en' => 'Add New Material',
            'ar' => 'إضافة مادة جديدة'
        ],
        'Material.edit' => [
            'en' => 'Edit Material',
            'ar' => 'تعديل المادة'
        ],
        'Material.title' => [
            'en' => 'Material',
            'ar' => 'المادة'
        ],
        'Material.list' => [
            'en' => 'Materials',
            'ar' => 'المواد'
        ],
        'Material.show' => [
            'en' => 'Show Material',
            'ar' => 'عرض المادة'
        ],

        'Parent.add_new' => [
            'en' => 'Add New Parent',
            'ar' => 'إضافة ولي أمر جديد'
        ],
        'Parent.edit' => [
            'en' => 'Edit Parent',
            'ar' => 'تعديل ولي الأمر'
        ],
        'Parent.title' => [
            'en' => 'Parent',
            'ar' => 'الوالد'
        ],
        'Parent.list' => [
            'en' => 'Parents',
            'ar' => 'الآباء'
        ],
        'Parent.show' => [
            'en' => 'Show Parent',
            'ar' => 'عرض الوالد'
        ],

        'Payment.add_new' => [
            'en' => 'Add New Payment',
            'ar' => 'إضافة دفعة جديدة'
        ],
        'Payment.edit' => [
            'en' => 'Edit Payment',
            'ar' => 'تعديل الدفعة'
        ],
        'Payment.title' => [
            'en' => 'Payment',
            'ar' => 'الدفعة'
        ],
        'Payment.list' => [
            'en' => 'Payments',
            'ar' => 'المدفوعات'
        ],
        'Payment.show' => [
            'en' => 'Show Payment',
            'ar' => 'عرض الدفعة'
        ],

        'Permission.add_new' => [
            'en' => 'Add New Permission',
            'ar' => 'إضافة صلاحية جديدة'
        ],
        'Permission.edit' => [
            'en' => 'Edit Permission',
            'ar' => 'تعديل الصلاحية'
        ],
        'Permission.title' => [
            'en' => 'Permission',
            'ar' => 'الصلاحية'
        ],
        'Permission.list' => [
            'en' => 'Permissions',
            'ar' => 'الصلاحيات'
        ],
        'Permission.show' => [
            'en' => 'Show Permission',
            'ar' => 'عرض الصلاحية'
        ],

        'Report.add_new' => [
            'en' => 'Add New Report',
            'ar' => 'إضافة تقرير جديد'
        ],
        'Report.edit' => [
            'en' => 'Edit Report',
            'ar' => 'تعديل التقرير'
        ],
        'Report.title' => [
            'en' => 'Report',
            'ar' => 'التقرير'
        ],
        'Report.list' => [
            'en' => 'Reports',
            'ar' => 'التقارير'
        ],
        'Report.show' => [
            'en' => 'Show Report',
            'ar' => 'عرض التقرير'
        ],

        'Role.add_new' => [
            'en' => 'Add New Role',
            'ar' => 'إضافة دور جديد'
        ],
        'Role.edit' => [
            'en' => 'Edit Role',
            'ar' => 'تعديل الدور'
        ],
        'Role.title' => [
            'en' => 'Role',
            'ar' => 'الدور'
        ],
        'Role.list' => [
            'en' => 'Roles',
            'ar' => 'الأدوار'
        ],
        'Role.show' => [
            'en' => 'Show Role',
            'ar' => 'عرض الدور'
        ],

        'Teacher.add_new' => [
            'en' => 'Add New Teacher',
            'ar' => 'إضافة معلم جديد'
        ],
        'Teacher.edit' => [
            'en' => 'Edit Teacher',
            'ar' => 'تعديل المعلم'
        ],
        'Teacher.title' => [
            'en' => 'Teacher',
            'ar' => 'المعلم'
        ],
        'Teacher.list' => [
            'en' => 'Teachers',
            'ar' => 'المعلمين'
        ],
        'Teacher.show' => [
            'en' => 'Show Teacher',
            'ar' => 'عرض المعلم'
        ],

        'TestModel.add_new' => [
            'en' => 'Add New Test Model',
            'ar' => 'إضافة نموذج اختبار جديد'
        ],
        'TestModel.edit' => [
            'en' => 'Edit Test Model',
            'ar' => 'تعديل نموذج الاختبار'
        ],
        'TestModel.title' => [
            'en' => 'Test Model',
            'ar' => 'نموذج الاختبار'
        ],
        'TestModel.list' => [
            'en' => 'Test Models',
            'ar' => 'نماذج الاختبار'
        ],
        'TestModel.show' => [
            'en' => 'Show Test Model',
            'ar' => 'عرض نموذج الاختبار'
        ],

        'User.add_new' => [
            'en' => 'Add New User',
            'ar' => 'إضافة مستخدم جديد'
        ],
        'User.edit' => [
            'en' => 'Edit User',
            'ar' => 'تعديل المستخدم'
        ],
        'User.title' => [
            'en' => 'User',
            'ar' => 'المستخدم'
        ],
        'User.list' => [
            'en' => 'Users',
            'ar' => 'المستخدمين'
        ],
        'User.show' => [
            'en' => 'Show User',
            'ar' => 'عرض المستخدم'
        ],
    ];

    public function __construct($projectRoot = null)
    {
        $this->projectRoot = $projectRoot ?: __DIR__;
        $this->langPath = $this->projectRoot . '/lang';
    }

    /**
     * Add all remaining professional translations
     */
    public function addTranslations()
    {
        echo "📝 Adding comprehensive translations...\n";

        $addedCount = 0;

        foreach ($this->translations as $key => $translations) {
            $this->addTranslationKey($key, $translations);
            $addedCount++;
        }

        echo "✅ Added {$addedCount} comprehensive translations successfully!\n";
    }

    /**
     * Add a single translation key to both language files
     */
    private function addTranslationKey($key, $translations)
    {
        $keyParts = explode('.', $key);
        $fileName = $keyParts[0];

        // Handle special cases for file naming (convert PascalCase to snake_case)
        $fileName = $this->camelCaseToSnakeCase($fileName);

        // Add to English file
        $this->updateLanguageFile('en', $fileName, $keyParts, $translations['en']);

        // Add to Arabic file
        $this->updateLanguageFile('ar', $fileName, $keyParts, $translations['ar']);
    }

    /**
     * Convert CamelCase to snake_case
     */
    private function camelCaseToSnakeCase($input)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    /**
     * Update a language file with the new translation
     */
    private function updateLanguageFile($language, $fileName, $keyParts, $translation)
    {
        $filePath = $this->langPath . '/' . $language . '/' . $fileName . '.php';

        // Load existing content
        $content = file_exists($filePath) ? file_get_contents($filePath) : "<?php\n\nreturn [\n];\n";

        // Parse the PHP array
        $translations = [];
        if (file_exists($filePath)) {
            $translations = include $filePath;
        }

        // Set the nested value
        $this->setNestedArrayValue($translations, $keyParts, $translation);

        // Write back to file with proper formatting
        $this->writeTranslationFile($filePath, $translations);
    }

    /**
     * Set value in nested array
     */
    private function setNestedArrayValue(&$array, $keys, $value)
    {
        $current = &$array;
        $lastKey = array_pop($keys);

        foreach ($keys as $key) {
            if (!isset($current[$key]) || !is_array($current[$key])) {
                $current[$key] = [];
            }
            $current = &$current[$key];
        }

        $current[$lastKey] = $value;
    }

    /**
     * Write translation file with proper formatting
     */
    private function writeTranslationFile($filePath, $translations)
    {
        $content = "<?php\n\nreturn [\n";
        $content .= $this->formatArray($translations, 1);
        $content .= "];\n";

        file_put_contents($filePath, $content);
    }

    /**
     * Format array for PHP translation file
     */
    private function formatArray($array, $indentLevel = 1)
    {
        $indent = str_repeat('    ', $indentLevel);
        $content = '';

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $content .= "{$indent}'{$key}' => [\n";
                $content .= $this->formatArray($value, $indentLevel + 1);
                $content .= "{$indent}],\n";
            } else {
                $content .= "{$indent}'{$key}' => '" . addslashes($value) . "',\n";
            }
        }

        return $content;
    }

    /**
     * Run the comprehensive translation addition process
     */
    public function run()
    {
        echo "🚀 Starting Comprehensive Translation Fixer\n";
        echo "==========================================\n\n";

        $this->addTranslations();

        echo "\n✅ All comprehensive translations have been added successfully!\n";
        echo "The application now has even more complete Arabic and English translations.\n";
    }
}

// Run the script
if (php_sapi_name() === 'cli') {
    $fixer = new ComprehensiveTranslationFixer();
    $fixer->run();
}
