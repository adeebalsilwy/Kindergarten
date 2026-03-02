<?php

/**
 * Translation Cleanup Script
 *
 * This script cleans up the improperly created translation files
 * and consolidates them into proper structured files
 */

class TranslationCleanup
{
    private $langPath;

    public function __construct($projectRoot = null)
    {
        $this->langPath = ($projectRoot ?: __DIR__) . '/lang';
    }

    /**
     * Clean up improperly created translation files
     */
    public function cleanUp()
    {
        echo "🧹 Cleaning up improperly created translation files...\n";

        // List of problematic files that were created with Arabic text as filenames
        $problematicFiles = [
            'lang/ar/إضافة تسجيل جديد.php',
            'lang/ar/الرئيسية.php',
            'lang/ar/التسجيلات.php',
            'lang/ar/إضافة جديد.php',
            'lang/ar/نموذج تسجيل فصل جديد.php',
            'lang/ar/العودة إلى القائمة.php',
            'lang/ar/الصف.php',
            'lang/ar/اختر الصف.php',
            'lang/ar/مواقع متاحة.php',
            'lang/ar/اختر الصف الذي سيتم تسجيل الطفل فيه.php',
            'lang/ar/الطفل.php',
            'lang/ar/اختر الطفل.php',
            'lang/ar/سنوات.php',
            'lang/ar/اختر الطفل الذي سيتم تسجيله.php',
            'lang/ar/تاريخ التسجيل.php',
            'lang/ar/حدد تاريخ بدء التسجيل.php',
            'lang/ar/الحالة.php',
            'lang/ar/نشط.php',
            'lang/ar/غير نشط.php',
            'lang/ar/مكتمل.php',
            'lang/ar/منقول.php',
            'lang/ar/حالة التسجيل الحالية.php',
            'lang/ar/السبب.php',
            'lang/ar/أدخل السبب إذا لزم الأمر.php',
            'lang/ar/سبب التسجيل أو أي ملاحظات إضافية.php',
            'lang/ar/تأكيد التسجيل.php',
            'lang/ar/يرجى التأكد من صحة المعلومات قبل الإرسال.php',
            'lang/ar/إلغاء.php',
            'lang/ar/حفظ التسجيل.php',
            'lang/ar/تسجيل جماعي.php',
            'lang/ar/إغلاق.php',
            'lang/ar/الطلاب.php',
            'lang/ar/اختر الطلاب الذين سيتم تسجيلهم.php',
            'lang/ar/تنفيذ التسجيل الجماعي.php',
            'lang/ar/هذا الصف ممتلئ.php',
            'lang/ar/سيتم تسجيل.php',
            'lang/ar/في.php',
            'lang/ar/هل أنت متأكد من استمرار العملية؟.php',
            'lang/ar/اختر الأطفال.php',
            'lang/ar/يرجى اختيار الصف والأطفال.php',
            'lang/ar/تم بدء عملية التسجيل الجماعي.php',
            'lang/ar/تعديل التسجيل.php',
            'lang/ar/تعديل.php',
            'lang/ar/تحديث معلومات التسجيل.php',
            'lang/ar/عرض التفاصيل.php',
            'lang/ar/تاريخ بدء التسجيل.php',
            'lang/ar/تاريخ الانسحاب.php',
            'lang/ar/تاريخ انسحاب الطفل من الصف (اختياري).php',
            'lang/ar/رقم التسجيل.php',
            'lang/ar/هذا هو الرقم التعريفي لهذا التسجيل.php',
            'lang/ar/سبب التغيير أو أي ملاحظات إضافية.php',
            'lang/ar/معلومات التسجيل الحالية.php',
            'lang/ar/تم الإنشاء في:.php',
            'lang/ar/آخر تحديث:.php',
            'lang/ar/مُنشئ التسجيل:.php',
            'lang/ar/غير محدد.php',
            'lang/ar/نقل الطفل إلى صف آخر.php',
            'lang/ar/تحديث التسجيل.php',
            'lang/ar/الصف الجديد.php',
            'lang/ar/اختر الصف الجديد.php',
            'lang/ar/سبب النقل.php',
            'lang/ar/أدخل سبب نقل الطفل إلى الصف الجديد.php',
            'lang/ar/تاريخ النقل.php',
            'lang/ar/نقل الطفل.php',
            'lang/ar/سيتم تحديث تسجيل.php',
            'lang/ar/إدارة التسجيلات في الفصول.php',
            'lang/ar/قائمة تسجيلات الفصول.php',
            'lang/ar/الفلاتر.php',
            'lang/ar/جميع الصفوف.php',
            'lang/ar/جميع الأطفال.php',
            'lang/ar/جميع الحالات.php',
            'lang/ar/تصفية.php',
            'lang/ar/إعادة تعيين.php',
            'lang/ar/التسجيلات النشطة.php',
            'lang/ar/التسجيلات المكتملة.php',
            'lang/ar/غير النشطة.php',
            'lang/ar/المنقولة.php',
            'lang/ar/تحديد الكل.php',
            'lang/ar/إجراءات جماعية.php',
            'lang/ar/تحديث الحالة.php',
            'lang/ar/نقل.php',
            'lang/ar/حذف.php',
            'lang/ar/إظهار.php',
            'lang/ar/إلى.php',
            'lang/ar/من.php',
            'lang/ar/عناصر.php',
            'lang/ar/الرقم.php',
            'lang/ar/مُنشئ التسجيل.php',
            'lang/ar/الإجراءات.php',
            'lang/ar/هل أنت متأكد من حذف هذا التسجيل؟.php',
            'lang/ar/لا توجد تسجيلات في الوقت الحالي.php',
            'lang/ar/إضافة تسجيل.php',
            'lang/ar/إجراء جماعي.php',
            'lang/ar/هل أنت متأكد من تنفيذ هذا الإجراء على.php',
            'lang/ar/تسجيلات محددة؟.php',
            'lang/ar/تأكيد.php',
            'lang/ar/الرجاء تحديد تسجيلات أولاً.php',
            'lang/ar/الحالة الجديدة.php',
            'lang/ar/سيتم حذف التسجيلات المحددة نهائياً.php',
            'lang/ar/هل أنت متأكد من حذف التسجيلات المحددة؟ لا يمكن التراجع عن هذا الإجراء.php',
            'lang/ar/تم تنفيذ الإجراء الجماعي بنجاح.php',
            'lang/ar/حدث خطأ أثناء تنفيذ الإجراء.php',
            'lang/ar/تفاصيل التسجيل.php',
            'lang/ar/التفاصيل.php',
            'lang/ar/معلومات التسجيل.php',
            'lang/ar/معلومات الطفل.php',
            'lang/ar/الجنس.php',
            'lang/ar/ذكر.php',
            'lang/ar/أنثى.php',
            'lang/ar/تاريخ الميلاد.php',
            'lang/ar/الصف الحالي.php',
            'lang/ar/معلومات الصف.php',
            'lang/ar/الوصف.php',
            'lang/ar/السعة.php',
            'lang/ar/طلاب.php',
            'lang/ar/عدد الطلاب الحالي.php',
            'lang/ar/معلم الصف.php',
            'lang/ar/معلومات إضافية.php',
            'lang/ar/تم الإنشاء في.php',
            'lang/ar/آخر تحديث.php',
            'lang/ar/نوع التسجيل.php',
            'lang/ar/تسجيل نشط.php',
            'lang/ar/تسجيل غير نشط.php',
            'lang/ar/تسجيل مكتمل.php',
            'lang/ar/تسجيل منقول.php',
            'lang/ar/حذف التسجيل.php',
        ];

        $deletedCount = 0;

        foreach ($problematicFiles as $file) {
            $fullPath = __DIR__ . '/' . $file;
            if (file_exists($fullPath)) {
                unlink($fullPath);
                $deletedCount++;
                echo "🗑️  Deleted: {$file}\n";
            }
        }

        echo "✅ Deleted {$deletedCount} problematic files.\n";

        // Now let's create a proper class_enrollments.php file with all the translations
        $this->createProperClassEnrollmentsFile();

        echo "✅ Cleanup completed successfully!\n";
    }

    /**
     * Create a proper class_enrollments.php file
     */
    private function createProperClassEnrollmentsFile()
    {
        $arContent = "<?php\n\nreturn [\n" .
            "    'title' => 'إدارة التسجيلات في الفصول',\n" .
            "    'list' => 'قائمة تسجيلات الفصول',\n" .
            "    'add_new' => 'إضافة تسجيل جديد',\n" .
            "    'edit' => 'تعديل التسجيل',\n" .
            "    'show' => 'عرض التفاصيل',\n" .
            "    'enrollments' => 'التسجيلات',\n" .
            "    'fields' => [\n" .
            "        'class' => 'الصف',\n" .
            "        'child' => 'الطفل',\n" .
            "        'date' => 'تاريخ التسجيل',\n" .
            "        'status' => 'الحالة',\n" .
            "        'type' => 'نوع التسجيل',\n" .
            "        'reason' => 'السبب',\n" .
            "        'start_date' => 'تاريخ بدء التسجيل',\n" .
            "        'withdrawal_date' => 'تاريخ الانسحاب',\n" .
            "        'transfer_date' => 'تاريخ النقل',\n" .
            "        'registration_number' => 'رقم التسجيل',\n" .
            "        'notes' => 'سبب التغيير أو أي ملاحظات إضافية',\n" .
            "        'active' => 'نشط',\n" .
            "        'inactive' => 'غير نشط',\n" .
            "        'completed' => 'مكتمل',\n" .
            "        'transferred' => 'منقول',\n" .
            "    ],\n" .
            "    'actions' => [\n" .
            "        'save' => 'حفظ التسجيل',\n" .
            "        'cancel' => 'إلغاء',\n" .
            "        'update' => 'تحديث',\n" .
            "        'edit' => 'تعديل',\n" .
            "        'delete' => 'حذف',\n" .
            "        'confirm_delete' => 'هل أنت متأكد من حذف هذا التسجيل؟',\n" .
            "        'confirm_action' => 'هل أنت متأكد من تنفيذ هذا الإجراء على',\n" .
            "        'selected_enrollments' => 'تسجيلات محددة؟',\n" .
            "        'confirm' => 'تأكيد',\n" .
            "        'select_enrollments_first' => 'الرجاء تحديد تسجيلات أولاً.',\n" .
            "        'new_status' => 'الحالة الجديدة',\n" .
            "        'delete_selected' => 'سيتم حذف التسجيلات المحددة نهائياً.',\n" .
            "        'confirm_delete_multiple' => 'هل أنت متأكد من حذف التسجيلات المحددة؟ لا يمكن التراجع عن هذا الإجراء.',\n" .
            "        'bulk_action_success' => 'تم تنفيذ الإجراء الجماعي بنجاح',\n" .
            "        'bulk_action_error' => 'حدث خطأ أثناء تنفيذ الإجراء',\n" .
            "        'back_to_list' => 'العودة إلى القائمة',\n" .
            "        'close' => 'إغلاق',\n" .
            "        'confirm_registration' => 'تأكيد التسجيل',\n" .
            "        'bulk_enrollment' => 'تسجيل جماعي',\n" .
            "        'bulk_action' => 'إجراء جماعي',\n" .
            "        'transfer_child' => 'نقل الطفل',\n" .
            "        'update_registration' => 'تحديث التسجيل',\n" .
            "        'show' => 'إظهار',\n" .
            "        'transfer' => 'نقل',\n" .
            "        'select_all' => 'تحديد الكل',\n" .
            "        'update_status' => 'تحديث الحالة',\n" .
            "    ],\n" .
            "    'statuses' => [\n" .
            "        'active' => 'نشط',\n" .
            "        'inactive' => 'غير نشط',\n" .
            "        'completed' => 'مكتمل',\n" .
            "        'transferred' => 'منقول',\n" .
            "        'active_label' => 'تسجيل نشط',\n" .
            "        'inactive_label' => 'تسجيل غير نشط',\n" .
            "        'completed_label' => 'تسجيل مكتمل',\n" .
            "        'transferred_label' => 'تسجيل منقول',\n" .
            "    ],\n" .
            "    'filters' => [\n" .
            "        'title' => 'الفلاتر',\n" .
            "        'all_classes' => 'جميع الصفوف',\n" .
            "        'all_children' => 'جميع الأطفال',\n" .
            "        'all_statuses' => 'جميع الحالات',\n" .
            "        'apply' => 'تصفية',\n" .
            "        'reset' => 'إعادة تعيين',\n" .
            "    ],\n" .
            "    'bulk_operations' => [\n" .
            "        'title' => 'إجراءات جماعية',\n" .
            "        'select_class' => 'اختر الصف',\n" .
            "        'select_child' => 'اختر الطفل',\n" .
            "        'select_children' => 'اختر الأطفال',\n" .
            "        'selected_count' => 'سيتم تسجيل',\n" .
            "        'in' => 'في',\n" .
            "        'confirm_bulk' => 'هل أنت متأكد من استمرار العملية؟',\n" .
            "        'please_select_class_and_children' => 'يرجى اختيار الصف والأطفال',\n" .
            "        'bulk_process_started' => 'تم بدء عملية التسجيل الجماعي.',\n" .
            "        'class_full' => 'هذا الصف ممتلئ',\n" .
            "    ],\n" .
            "    'details' => [\n" .
            "        'title' => 'تفاصيل التسجيل',\n" .
            "        'subtitle' => 'التفاصيل',\n" .
            "        'registration_info' => 'معلومات التسجيل',\n" .
            "        'child_info' => 'معلومات الطفل',\n" .
            "        'class_info' => 'معلومات الصف',\n" .
            "        'additional_info' => 'معلومات إضافية',\n" .
            "        'created_at' => 'تم الإنشاء في',\n" .
            "        'updated_at' => 'آخر تحديث',\n" .
            "        'created_by' => 'مُنشئ التسجيل',\n" .
            "        'unknown' => 'غير محدد',\n" .
            "        'registration_number_label' => 'هذا هو الرقم التعريفي لهذا التسجيل',\n" .
            "        'current_status' => 'حالة التسجيل الحالية',\n" .
            "        'current_class' => 'الصف الحالي',\n" .
            "        'description' => 'الوصف',\n" .
            "        'capacity' => 'السعة',\n" .
            "        'students' => 'طلاب',\n" .
            "        'current_students' => 'عدد الطلاب الحالي',\n" .
            "        'teacher' => 'معلم الصف',\n" .
            "        'gender' => 'الجنس',\n" .
            "        'male' => 'ذكر',\n" .
            "        'female' => 'أنثى',\n" .
            "        'birth_date' => 'تاريخ الميلاد',\n" .
            "    ],\n" .
            "    'transfer' => [\n" .
            "        'title' => 'نقل الطفل إلى صف آخر',\n" .
            "        'new_class' => 'الصف الجديد',\n" .
            "        'select_new_class' => 'اختر الصف الجديد',\n" .
            "        'reason' => 'سبب النقل',\n" .
            "        'enter_reason' => 'أدخل سبب نقل الطفل إلى الصف الجديد',\n" .
            "        'date' => 'تاريخ النقل',\n" .
            "        'transfer_btn' => 'نقل الطفل',\n" .
            "        'will_update' => 'سيتم تحديث تسجيل',\n" .
            "    ],\n" .
            "    'messages' => [\n" .
            "        'created' => 'تم الإنشاء بنجاح',\n" .
            "        'updated' => 'تم التحديث بنجاح',\n" .
            "        'deleted' => 'تم الحذف بنجاح',\n" .
            "        'no_enrollments' => 'لا توجد تسجيلات في الوقت الحالي',\n" .
            "        'please_fill_correctly' => 'يرجى التأكد من صحة المعلومات قبل الإرسال',\n" .
            "        'enter_reason_if_needed' => 'أدخل السبب إذا لزم الأمر',\n" .
            "        'set_start_date' => 'حدد تاريخ بدء التسجيل',\n" .
            "        'optional_withdrawal_date' => 'تاريخ انسحاب الطفل من الصف (اختياري)',\n" .
            "    ],\n" .
            "];\n";

        $enContent = "<?php\n\nreturn [\n" .
            "    'title' => 'Class Enrollment Management',\n" .
            "    'list' => 'Class Enrollments List',\n" .
            "    'add_new' => 'Add New Enrollment',\n" .
            "    'edit' => 'Edit Enrollment',\n" .
            "    'show' => 'Show Details',\n" .
            "    'enrollments' => 'Enrollments',\n" .
            "    'fields' => [\n" .
            "        'class' => 'Class',\n" .
            "        'child' => 'Child',\n" .
            "        'date' => 'Enrollment Date',\n" .
            "        'status' => 'Status',\n" .
            "        'type' => 'Enrollment Type',\n" .
            "        'reason' => 'Reason',\n" .
            "        'start_date' => 'Start Date',\n" .
            "        'withdrawal_date' => 'Withdrawal Date',\n" .
            "        'transfer_date' => 'Transfer Date',\n" .
            "        'registration_number' => 'Registration Number',\n" .
            "        'notes' => 'Change reason or any additional notes',\n" .
            "        'active' => 'Active',\n" .
            "        'inactive' => 'Inactive',\n" .
            "        'completed' => 'Completed',\n" .
            "        'transferred' => 'Transferred',\n" .
            "    ],\n" .
            "    'actions' => [\n" .
            "        'save' => 'Save Enrollment',\n" .
            "        'cancel' => 'Cancel',\n" .
            "        'update' => 'Update',\n" .
            "        'edit' => 'Edit',\n" .
            "        'delete' => 'Delete',\n" .
            "        'confirm_delete' => 'Are you sure you want to delete this enrollment?',\n" .
            "        'confirm_action' => 'Are you sure you want to perform this action on',\n" .
            "        'selected_enrollments' => 'selected enrollments?',\n" .
            "        'confirm' => 'Confirm',\n" .
            "        'select_enrollments_first' => 'Please select enrollments first.',\n" .
            "        'new_status' => 'New status',\n" .
            "        'delete_selected' => 'Selected enrollments will be permanently deleted.',\n" .
            "        'confirm_delete_multiple' => 'Are you sure you want to delete the selected enrollments? This action cannot be undone.',\n" .
            "        'bulk_action_success' => 'Bulk action executed successfully',\n" .
            "        'bulk_action_error' => 'An error occurred while executing the action',\n" .
            "        'back_to_list' => 'Back to list',\n" .
            "        'close' => 'Close',\n" .
            "        'confirm_registration' => 'Confirm Registration',\n" .
            "        'bulk_enrollment' => 'Bulk Enrollment',\n" .
            "        'bulk_action' => 'Bulk Action',\n" .
            "        'transfer_child' => 'Transfer Child',\n" .
            "        'update_registration' => 'Update Registration',\n" .
            "        'show' => 'Show',\n" .
            "        'transfer' => 'Transfer',\n" .
            "        'select_all' => 'Select All',\n" .
            "        'update_status' => 'Update Status',\n" .
            "    ],\n" .
            "    'statuses' => [\n" .
            "        'active' => 'Active',\n" .
            "        'inactive' => 'Inactive',\n" .
            "        'completed' => 'Completed',\n" .
            "        'transferred' => 'Transferred',\n" .
            "        'active_label' => 'Active Enrollment',\n" .
            "        'inactive_label' => 'Inactive Enrollment',\n" .
            "        'completed_label' => 'Completed Enrollment',\n" .
            "        'transferred_label' => 'Transferred Enrollment',\n" .
            "    ],\n" .
            "    'filters' => [\n" .
            "        'title' => 'Filters',\n" .
            "        'all_classes' => 'All Classes',\n" .
            "        'all_children' => 'All Children',\n" .
            "        'all_statuses' => 'All Statuses',\n" .
            "        'apply' => 'Filter',\n" .
            "        'reset' => 'Reset',\n" .
            "    ],\n" .
            "    'bulk_operations' => [\n" .
            "        'title' => 'Bulk Operations',\n" .
            "        'select_class' => 'Select class',\n" .
            "        'select_child' => 'Select child',\n" .
            "        'select_children' => 'Select children',\n" .
            "        'selected_count' => 'Will register',\n" .
            "        'in' => 'in',\n" .
            "        'confirm_bulk' => 'Are you sure you want to continue?',\n" .
            "        'please_select_class_and_children' => 'Please select class and children',\n" .
            "        'bulk_process_started' => 'Bulk enrollment process started.',\n" .
            "        'class_full' => 'This class is full',\n" .
            "    ],\n" .
            "    'details' => [\n" .
            "        'title' => 'Enrollment Details',\n" .
            "        'subtitle' => 'Details',\n" .
            "        'registration_info' => 'Registration Info',\n" .
            "        'child_info' => 'Child Info',\n" .
            "        'class_info' => 'Class Info',\n" .
            "        'additional_info' => 'Additional Info',\n" .
            "        'created_at' => 'Created at',\n" .
            "        'updated_at' => 'Updated at',\n" .
            "        'created_by' => 'Created by',\n" .
            "        'unknown' => 'Unknown',\n" .
            "        'registration_number_label' => 'This is the identification number for this registration',\n" .
            "        'current_status' => 'Current registration status',\n" .
            "        'current_class' => 'Current class',\n" .
            "        'description' => 'Description',\n" .
            "        'capacity' => 'Capacity',\n" .
            "        'students' => 'Students',\n" .
            "        'current_students' => 'Current number of students',\n" .
            "        'teacher' => 'Class teacher',\n" .
            "        'gender' => 'Gender',\n" .
            "        'male' => 'Male',\n" .
            "        'female' => 'Female',\n" .
            "        'birth_date' => 'Birth Date',\n" .
            "    ],\n" .
            "    'transfer' => [\n" .
            "        'title' => 'Transfer child to another class',\n" .
            "        'new_class' => 'New Class',\n" .
            "        'select_new_class' => 'Select new class',\n" .
            "        'reason' => 'Transfer Reason',\n" .
            "        'enter_reason' => 'Enter reason for transferring child to new class',\n" .
            "        'date' => 'Transfer Date',\n" .
            "        'transfer_btn' => 'Transfer Child',\n" .
            "        'will_update' => 'Will update registration for',\n" .
            "    ],\n" .
            "    'messages' => [\n" .
            "        'created' => 'Created successfully',\n" .
            "        'updated' => 'Updated successfully',\n" .
            "        'deleted' => 'Deleted successfully',\n" .
            "        'no_enrollments' => 'No enrollments at the moment',\n" .
            "        'please_fill_correctly' => 'Please make sure information is correct before submitting',\n" .
            "        'enter_reason_if_needed' => 'Enter reason if needed',\n" .
            "        'set_start_date' => 'Set start date',\n" .
            "        'optional_withdrawal_date' => 'Child withdrawal date from class (optional)',\n" .
            "    ],\n" .
            "];\n";

        file_put_contents($this->langPath . '/ar/class_enrollments.php', $arContent);
        file_put_contents($this->langPath . '/en/class_enrollments.php', $enContent);

        echo "✅ Created proper class_enrollments.php files\n";
    }

    /**
     * Run the cleanup process
     */
    public function run()
    {
        echo "🚀 Starting Translation Cleanup Process\n";
        echo "=====================================\n\n";

        $this->cleanUp();

        echo "\n✅ Translation cleanup completed successfully!\n";
    }
}

// Run the script
if (php_sapi_name() === 'cli') {
    $cleanup = new TranslationCleanup();
    $cleanup->run();
}
