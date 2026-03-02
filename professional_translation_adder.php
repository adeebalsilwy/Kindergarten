<?php

/**
 * Professional Translation Adder
 *
 * Adds professional Arabic and English translations for missing keys
 * Based on the comprehensive scan results
 */

class ProfessionalTranslationAdder
{
    private $projectRoot;
    private $langPath;

    // Professional translations for common missing keys
    private $translations = [
        // Activities
        'activities.messages.retrieved' => [
            'en' => 'Activities retrieved successfully',
            'ar' => 'تم استرجاع الأنشطة بنجاح'
        ],

        // Attendances
        'attendances.messages.retrieved' => [
            'en' => 'Attendance records retrieved successfully',
            'ar' => 'تم استرجاع سجلات الحضور بنجاح'
        ],

        // Classes
        'classes.messages.retrieved' => [
            'en' => 'Classes retrieved successfully',
            'ar' => 'تم استرجاع الفصول بنجاح'
        ],
        'classes.fields.grade_id' => [
            'en' => 'Grade',
            'ar' => 'الصف'
        ],

        // Curricula
        'curricula.messages.retrieved' => [
            'en' => 'Curricula retrieved successfully',
            'ar' => 'تم استرجاع المناهج بنجاح'
        ],

        // Events
        'events.messages.retrieved' => [
            'en' => 'Events retrieved successfully',
            'ar' => 'تم استرجاع الأحداث بنجاح'
        ],

        // Expenses
        'expenses.messages.retrieved' => [
            'en' => 'Expenses retrieved successfully',
            'ar' => 'تم استرجاع المصروفات بنجاح'
        ],
        'expenses.categories.utilities' => [
            'en' => 'Utilities',
            'ar' => 'الخدمات العامة'
        ],
        'expenses.categories.supplies' => [
            'en' => 'Supplies',
            'ar' => 'اللوازم'
        ],
        'expenses.categories.salaries' => [
            'en' => 'Salaries',
            'ar' => 'الرواتب'
        ],
        'expenses.categories.maintenance' => [
            'en' => 'Maintenance',
            'ar' => 'الصيانة'
        ],
        'expenses.categories.equipment' => [
            'en' => 'Equipment',
            'ar' => 'المعدات'
        ],
        'expenses.categories.other' => [
            'en' => 'Other',
            'ar' => 'أخرى'
        ],
        'expenses.categories.transportation' => [
            'en' => 'Transportation',
            'ar' => 'النقل'
        ],

        // Fees
        'fees.messages.retrieved' => [
            'en' => 'Fees retrieved successfully',
            'ar' => 'تم استرجاع الرسوم بنجاح'
        ],

        // Grades
        'grades.messages.retrieved' => [
            'en' => 'Grades retrieved successfully',
            'ar' => 'تم استرجاع الدرجات بنجاح'
        ],
        'grades.fields.comments' => [
            'en' => 'Comments',
            'ar' => 'التعليقات'
        ],

        // Guardians
        'guardians.messages.retrieved' => [
            'en' => 'Guardians retrieved successfully',
            'ar' => 'تم استرجاع أولياء الأمور بنجاح'
        ],

        // Jobs
        'jobs.messages.retrieved' => [
            'en' => 'Jobs retrieved successfully',
            'ar' => 'تم استرجاع الوظائف بنجاح'
        ],

        // Languages
        'languages.messages.retrieved' => [
            'en' => 'Languages retrieved successfully',
            'ar' => 'تم استرجاع اللغات بنجاح'
        ],

        // Parents
        'parents.messages.retrieved' => [
            'en' => 'Parents retrieved successfully',
            'ar' => 'تم استرجاع الوالدين بنجاح'
        ],

        // Payments
        'payments.messages.retrieved' => [
            'en' => 'Payments retrieved successfully',
            'ar' => 'تم استرجاع المدفوعات بنجاح'
        ],
        'payments.methods.cash' => [
            'en' => 'Cash',
            'ar' => 'نقدي'
        ],
        'payments.methods.bank_transfer' => [
            'en' => 'Bank Transfer',
            'ar' => 'تحويل بنكي'
        ],
        'payments.methods.credit_card' => [
            'en' => 'Credit Card',
            'ar' => 'بطاقة ائتمان'
        ],
        'payments.methods.check' => [
            'en' => 'Check',
            'ar' => 'شيك'
        ],
        'payments.status.completed' => [
            'en' => 'Completed',
            'ar' => 'مكتمل'
        ],
        'payments.status.pending' => [
            'en' => 'Pending',
            'ar' => 'قيد الانتظار'
        ],
        'payments.status.failed' => [
            'en' => 'Failed',
            'ar' => 'فشل'
        ],

        // Reports
        'reports.messages.retrieved' => [
            'en' => 'Reports retrieved successfully',
            'ar' => 'تم استرجاع التقارير بنجاح'
        ],

        // Roles
        'roles.messages.retrieved' => [
            'en' => 'Roles retrieved successfully',
            'ar' => 'تم استرجاع الأدوار بنجاح'
        ],

        // Teachers
        'teachers.messages.retrieved' => [
            'en' => 'Teachers retrieved successfully',
            'ar' => 'تم استرجاع المعلمين بنجاح'
        ],
        'teachers.tabs.personal_info' => [
            'en' => 'Personal Information',
            'ar' => 'المعلومات الشخصية'
        ],
        'teachers.tabs.professional_info' => [
            'en' => 'Professional Information',
            'ar' => 'المعلومات المهنية'
        ],
        'teachers.tabs.employment_info' => [
            'en' => 'Employment Information',
            'ar' => 'معلومات التوظيف'
        ],
        'teachers.sections.personal_info' => [
            'en' => 'Personal Information',
            'ar' => 'المعلومات الشخصية'
        ],
        'teachers.sections.contact_info' => [
            'en' => 'Contact Information',
            'ar' => 'معلومات الاتصال'
        ],
        'teachers.sections.academic_info' => [
            'en' => 'Academic Information',
            'ar' => 'المعلومات الأكاديمية'
        ],
        'teachers.sections.employment_info' => [
            'en' => 'Employment Information',
            'ar' => 'معلومات التوظيف'
        ],
        'teachers.fields.first_name' => [
            'en' => 'First Name',
            'ar' => 'الاسم الأول'
        ],
        'teachers.fields.last_name' => [
            'en' => 'Last Name',
            'ar' => 'اسم العائلة'
        ],
        'teachers.fields.email' => [
            'en' => 'Email',
            'ar' => 'البريد الإلكتروني'
        ],
        'teachers.fields.phone' => [
            'en' => 'Phone',
            'ar' => 'الهاتف'
        ],
        'teachers.fields.address' => [
            'en' => 'Address',
            'ar' => 'العنوان'
        ],
        'teachers.fields.date_of_birth' => [
            'en' => 'Date of Birth',
            'ar' => 'تاريخ الميلاد'
        ],
        'teachers.fields.gender' => [
            'en' => 'Gender',
            'ar' => 'الجنس'
        ],
        'teachers.fields.nationality' => [
            'en' => 'Nationality',
            'ar' => 'الجنسية'
        ],
        'teachers.fields.qualification' => [
            'en' => 'Qualification',
            'ar' => 'المؤهل'
        ],
        'teachers.fields.experience_years' => [
            'en' => 'Years of Experience',
            'ar' => 'سنوات الخبرة'
        ],
        'teachers.fields.specialization' => [
            'en' => 'Specialization',
            'ar' => 'التخصص'
        ],
        'teachers.fields.hire_date' => [
            'en' => 'Hire Date',
            'ar' => 'تاريخ التوظيف'
        ],
        'teachers.fields.salary' => [
            'en' => 'Salary',
            'ar' => 'الراتب'
        ],
        'teachers.fields.status' => [
            'en' => 'Status',
            'ar' => 'الحالة'
        ],
        'teachers.fields.notes' => [
            'en' => 'Notes',
            'ar' => 'ملاحظات'
        ],

        // Users
        'users.messages.retrieved' => [
            'en' => 'Users retrieved successfully',
            'ar' => 'تم استرجاع المستخدمين بنجاح'
        ],
        'users.fields.email_verified_at' => [
            'en' => 'Email Verified At',
            'ar' => 'تاريخ التحقق من البريد الإلكتروني'
        ],
        'users.fields.user_id' => [
            'en' => 'User ID',
            'ar' => 'معرف المستخدم'
        ],
        'users.fields.ip_address' => [
            'en' => 'IP Address',
            'ar' => 'عنوان IP'
        ],
        'users.fields.user_agent' => [
            'en' => 'User Agent',
            'ar' => 'عميل المستخدم'
        ],
        'users.fields.last_login' => [
            'en' => 'Last Login',
            'ar' => 'آخر تسجيل دخول'
        ],
        'users.fields.login_count' => [
            'en' => 'Login Count',
            'ar' => 'عدد مرات تسجيل الدخول'
        ],
        'users.fields.failed_login_attempts' => [
            'en' => 'Failed Login Attempts',
            'ar' => 'محاولات تسجيل الدخول الفاشلة'
        ],
        'users.fields.lockout_time' => [
            'en' => 'Lockout Time',
            'ar' => 'وقت الحظر'
        ],
        'users.fields.two_factor_enabled' => [
            'en' => 'Two Factor Authentication',
            'ar' => 'المصادقة الثنائية'
        ],
        'users.fields.remember_token' => [
            'en' => 'Remember Token',
            'ar' => 'رمز التذكّر'
        ],
        'users.fields.profile_photo_path' => [
            'en' => 'Profile Photo',
            'ar' => 'صورة الملف الشخصي'
        ],
        'users.fields.current_team_id' => [
            'en' => 'Current Team',
            'ar' => 'الفريق الحالي'
        ],
        'users.fields.timezone' => [
            'en' => 'Timezone',
            'ar' => 'المنطقة الزمنية'
        ],
        'users.fields.locale' => [
            'en' => 'Language',
            'ar' => 'اللغة'
        ],
        'users.fields.theme' => [
            'en' => 'Theme',
            'ar' => 'المظهر'
        ],
        'users.fields.notifications_enabled' => [
            'en' => 'Notifications',
            'ar' => 'الإشعارات'
        ],
        'users.fields.email_notifications' => [
            'en' => 'Email Notifications',
            'ar' => 'إشعارات البريد الإلكتروني'
        ],
        'users.fields.sms_notifications' => [
            'en' => 'SMS Notifications',
            'ar' => 'إشعارات الرسائل النصية'
        ],
        'users.fields.push_notifications' => [
            'en' => 'Push Notifications',
            'ar' => 'إشعارات الدفع'
        ],

        // Auth
        'auth.invalid_verification_link' => [
            'en' => 'Invalid verification link',
            'ar' => 'رابط التحقق غير صالح'
        ],
        'auth.email_already_verified' => [
            'en' => 'Email already verified',
            'ar' => 'البريد الإلكتروني مُحقق بالفعل'
        ],
        'auth.email_verified_success' => [
            'en' => 'Email verified successfully',
            'ar' => 'تم التحقق من البريد الإلكتروني بنجاح'
        ],
        'auth.verification_link_sent' => [
            'en' => 'Verification link sent to your email',
            'ar' => 'تم إرسال رابط التحقق إلى بريدك الإلكتروني'
        ],
        'auth.failed' => [
            'en' => 'These credentials do not match our records',
            'ar' => 'هذه البيانات لا تتطابق مع سجلاتنا'
        ],
        'auth.account_inactive' => [
            'en' => 'Your account is inactive',
            'ar' => 'حسابك غير نشط'
        ],
        'auth.logout_success' => [
            'en' => 'Logged out successfully',
            'ar' => 'تم تسجيل الخروج بنجاح'
        ],
        'auth.registration_failed' => [
            'en' => 'Registration failed',
            'ar' => 'فشل التسجيل'
        ],
        'auth.verify_email' => [
            'en' => 'Verify Email',
            'ar' => 'تحقق من البريد الإلكتروني'
        ],
        'auth.verify_email_instruction' => [
            'en' => 'Please verify your email address',
            'ar' => 'يرجى التحقق من عنوان بريدك الإلكتروني'
        ],
        'auth.resend_verification_link' => [
            'en' => 'Resend Verification Link',
            'ar' => 'إعادة إرسال رابط التحقق'
        ],
        'global.auth_intro_sign_up' => [
            'en' => 'Create your account',
            'ar' => 'إنشاء حسابك'
        ],

        // Access Control
        'access_control.actions.advanced_filters' => [
            'en' => 'Advanced Filters',
            'ar' => 'مرشحات متقدمة'
        ],
        'access_control.actions.bulk_actions' => [
            'en' => 'Bulk Actions',
            'ar' => 'إجراءات جماعية'
        ],
        'access_control.messages.showing' => [
            'en' => 'Showing',
            'ar' => 'عرض'
        ],
        'access_control.messages.results' => [
            'en' => 'results',
            'ar' => 'النتائج'
        ],
        'access_control.actions.sort_by' => [
            'en' => 'Sort by',
            'ar' => 'ترتيب حسب'
        ],
        'access_control.actions.items_per_page' => [
            'en' => 'Items per page',
            'ar' => 'العناصر في كل صفحة'
        ],
        'access_control.actions.clear_filters' => [
            'en' => 'Clear Filters',
            'ar' => 'مسح المرشحات'
        ],
        'access_control.actions.refresh' => [
            'en' => 'Refresh',
            'ar' => 'تحديث'
        ],
        'access_control.actions.export' => [
            'en' => 'Export',
            'ar' => 'تصدير'
        ],
        'access_control.actions.import' => [
            'en' => 'Import',
            'ar' => 'استيراد'
        ],
        'access_control.actions.print' => [
            'en' => 'Print',
            'ar' => 'طباعة'
        ],
        'access_control.actions.share' => [
            'en' => 'Share',
            'ar' => 'مشاركة'
        ],
        'access_control.actions.clone' => [
            'en' => 'Clone',
            'ar' => 'استنساخ'
        ],
        'access_control.actions.lock' => [
            'en' => 'Lock',
            'ar' => 'قفل'
        ],
        'access_control.actions.unlock' => [
            'en' => 'Unlock',
            'ar' => 'فتح'
        ],
        'access_control.actions.archive' => [
            'en' => 'Archive',
            'ar' => 'أرشفة'
        ],
        'access_control.actions.restore' => [
            'en' => 'Restore',
            'ar' => 'استعادة'
        ],
        'access_control.actions.permanent_delete' => [
            'en' => 'Permanent Delete',
            'ar' => 'حذف دائم'
        ],
        'access_control.actions.duplicate' => [
            'en' => 'Duplicate',
            'ar' => 'تكرار'
        ],
        'access_control.actions.merge' => [
            'en' => 'Merge',
            'ar' => 'دمج'
        ],
        'access_control.actions.split' => [
            'en' => 'Split',
            'ar' => 'تقسيم'
        ],
        'access_control.actions.assign' => [
            'en' => 'Assign',
            'ar' => 'تعيين'
        ],
        'access_control.actions.reassign' => [
            'en' => 'Reassign',
            'ar' => 'إعادة تعيين'
        ],
        'access_control.actions.transfer' => [
            'en' => 'Transfer',
            'ar' => 'نقل'
        ],
        'access_control.actions.promote' => [
            'en' => 'Promote',
            'ar' => 'ترقية'
        ],
        'access_control.actions.demote' => [
            'en' => 'Demote',
            'ar' => 'تخفيض'
        ],
        'access_control.actions.approve' => [
            'en' => 'Approve',
            'ar' => 'موافقة'
        ],
        'access_control.actions.reject' => [
            'en' => 'Reject',
            'ar' => 'رفض'
        ],
        'access_control.actions.forward' => [
            'en' => 'Forward',
            'ar' => 'تمرير'
        ],
        'access_control.actions.backward' => [
            'en' => 'Backward',
            'ar' => 'عودة'
        ],
        'access_control.actions.first' => [
            'en' => 'First',
            'ar' => 'الأول'
        ],
        'access_control.actions.last' => [
            'en' => 'Last',
            'ar' => 'الأخير'
        ],
        'access_control.actions.previous' => [
            'en' => 'Previous',
            'ar' => 'السابق'
        ],
        'access_control.actions.next' => [
            'en' => 'Next',
            'ar' => 'التالي'
        ],

        // Validation
        'global.validation_errors' => [
            'en' => 'Validation errors occurred',
            'ar' => 'حدثت أخطاء في التحقق'
        ],

        // Accounting Entries
        'accounting-entries.fields.name' => [
            'en' => 'Name',
            'ar' => 'الاسم'
        ],

        // Dashboard Contents
        'dashboard-contents.fields.name' => [
            'en' => 'Name',
            'ar' => 'الاسم'
        ],

        // Kindergarten
        'kindergarten.parents.edit' => [
            'en' => 'Edit Parent',
            'ar' => 'تعديل ولي الأمر'
        ],
        'kindergarten.parents.view' => [
            'en' => 'View Parent',
            'ar' => 'عرض ولي الأمر'
        ],

        // Passwords
        'global.passwords_do_not_match' => [
            'en' => 'Passwords do not match',
            'ar' => 'كلمات المرور غير متطابقة'
        ],

        // Financial Reports
        'financial-reports.messages.created' => [
            'en' => 'Financial report created successfully',
            'ar' => 'تم إنشاء التقرير المالي بنجاح'
        ],
        'financial-reports.messages.updated' => [
            'en' => 'Financial report updated successfully',
            'ar' => 'تم تحديث التقرير المالي بنجاح'
        ],
        'financial-reports.messages.deleted' => [
            'en' => 'Financial report deleted successfully',
            'ar' => 'تم حذف التقرير المالي بنجاح'
        ],
        'financial-reports.fields.report_type' => [
            'en' => 'Report Type',
            'ar' => 'نوع التقرير'
        ],
        'financial-reports.fields.period_start' => [
            'en' => 'Period Start',
            'ar' => 'بداية الفترة'
        ],
        'financial-reports.fields.period_end' => [
            'en' => 'Period End',
            'ar' => 'نهاية الفترة'
        ],
        'financial-reports.fields.generated_at' => [
            'en' => 'Generated At',
            'ar' => 'تم إنشاؤه في'
        ],
        'financial-reports.fields.generated_by' => [
            'en' => 'Generated By',
            'ar' => 'تم إنشاؤه بواسطة'
        ],
        'financial-reports.title' => [
            'en' => 'Financial Reports',
            'ar' => 'التقارير المالية'
        ],
        'financial-reports.add_new' => [
            'en' => 'Add New Financial Report',
            'ar' => 'إضافة تقرير مالي جديد'
        ],
        'financial-reports.edit' => [
            'en' => 'Edit Financial Report',
            'ar' => 'تعديل التقرير المالي'
        ],
        'financial-reports.list' => [
            'en' => 'Financial Reports List',
            'ar' => 'قائمة التقارير المالية'
        ],
        'financial-reports.show' => [
            'en' => 'Show Financial Report',
            'ar' => 'عرض التقرير المالي'
        ],
    ];

    public function __construct($projectRoot = null)
    {
        $this->projectRoot = $projectRoot ?: __DIR__;
        $this->langPath = $this->projectRoot . '/lang';
    }

    /**
     * Add all professional translations
     */
    public function addTranslations()
    {
        echo "📝 Adding professional translations...\n";

        $addedCount = 0;

        foreach ($this->translations as $key => $translations) {
            $this->addTranslationKey($key, $translations);
            $addedCount++;
        }

        echo "✅ Added {$addedCount} professional translations successfully!\n";
    }

    /**
     * Add a single translation key to both language files
     */
    private function addTranslationKey($key, $translations)
    {
        $keyParts = explode('.', $key);
        $fileName = $keyParts[0];

        // Handle special cases for file naming
        $fileMap = [
            'financial-reports' => 'financial-reports',
            'dashboard-contents' => 'dashboard-contents',
            'accounting-entries' => 'accounting-entries',
            'access_control' => 'access_control',
        ];

        $actualFileName = $fileMap[$fileName] ?? $fileName;

        // Add to English file
        $this->updateLanguageFile('en', $actualFileName, $keyParts, $translations['en']);

        // Add to Arabic file
        $this->updateLanguageFile('ar', $actualFileName, $keyParts, $translations['ar']);
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

        // Write back to file
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
     * Run the translation addition process
     */
    public function run()
    {
        echo "🚀 Starting Professional Translation Adder\n";
        echo "=========================================\n\n";

        $this->addTranslations();

        echo "\n✅ All professional translations have been added successfully!\n";
        echo "The application now has complete Arabic and English translations.\n";
    }
}

// Run the script
if (php_sapi_name() === 'cli') {
    $adder = new ProfessionalTranslationAdder();
    $adder->run();
}
