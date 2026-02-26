<?php

return [
    'title' => 'الوالدين/الأوصياء',
    'add_new' => 'إضافة ولي أمر جديد',
    'edit' => 'تعديل ولي الأمر',
    'list' => 'قائمة الأولياء',
    
    // Tabs
    'tabs' => [
        'personal_info' => 'المعلومات الشخصية',
        'work_info' => 'معلومات العمل',
        'contact_info' => 'معلومات الاتصال',
        'settings' => 'الإعدادات',
    ],
    
    // Sections
    'sections' => [
        'personal_info' => 'المعلومات الشخصية',
        'work_info' => 'معلومات العمل',
        'contact_info' => 'معلومات الاتصال',
        'settings' => 'إعدادات الحساب',
    ],
    
    // Descriptions
    'descriptions' => [
        'personal_info' => 'أدخل المعلومات الشخصية لولي الأمر بما في ذلك الاسم وتفاصيل الاتصال والهوية.',
        'work_info' => 'قم بتوفير معلومات حول مهنة ولي الأمر ومكان العمل.',
        'contact_info' => 'أدخل تفاصيل العلاقة والمعلومات الكاملة للعنوان.',
        'settings' => 'قم بتكوين إعدادات الحساب وتفضيلات الإشعارات.',
    ],
    
    'fields' => [
        'name' => 'الاسم الكامل',
        'email' => 'عنوان البريد الإلكتروني',
        'phone' => 'الهاتف الرئيسي',
        'secondary_phone' => 'الهاتف الثانوي',
        'date_of_birth' => 'تاريخ الميلاد',
        'national_id' => 'الهوية الوطنية',
        'passport_number' => 'رقم جواز السفر',
        'preferred_language' => 'اللغة المفضلة',
        'occupation' => 'المهنة',
        'workplace' => 'مكان العمل',
        'bank_name' => 'اسم البنك',
        'bank_account_number' => 'رقم الحساب البنكي',
        'relationship' => 'العلاقة بالطفل',
        'address' => 'العنوان الكامل',
        'is_primary_guardian' => 'الوصي الرئيسي',
        'is_primary_emergency_contact' => 'جهة الاتصال في حالات الطوارئ الرئيسية',
        'receives_sms_notifications' => 'تلقي إشعارات SMS',
        'receives_email_notifications' => 'تلقي إشعارات البريد الإلكتروني',
        'is_active' => 'الحساب نشط',
        'notes' => 'ملاحظات إضافية',
    ],
    
    // Placeholders
    'placeholders' => [
        'name' => 'أدخل الاسم الكامل',
        'email' => 'أدخل عنوان البريد الإلكتروني',
        'phone' => 'أدخل رقم الهاتف الرئيسي',
        'secondary_phone' => 'أدخل رقم الهاتف الثانوي',
        'national_id' => 'أدخل رقم الهوية الوطنية',
        'passport_number' => 'أدخل رقم جواز السفر',
        'occupation' => 'أدخل المهنة الحالية',
        'workplace' => 'أدخل اسم مكان العمل',
        'bank_name' => 'أدخل اسم البنك',
        'bank_account_number' => 'أدخل رقم الحساب البنكي',
        'address' => 'أدخل العنوان الكامل بما في ذلك الشارع والمدينة والرمز البريدي',
        'notes' => 'أدخل أي معلومات أو ملاحظات إضافية',
    ],
    
    // Relationships
    'relationships' => [
        'father' => 'أب',
        'mother' => 'أم',
        'grandfather' => 'جد',
        'grandmother' => 'جدة',
        'uncle' => 'عم/خال',
        'aunt' => 'عمة/خالة',
        'other' => 'أخرى',
    ],
    
    'actions' => [
        'save' => 'حفظ ولي الأمر',
        'cancel' => 'إلغاء',
        'update' => 'تحديث ولي الأمر',
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'confirm_delete' => 'هل أنت متأكد من حذف سجل ولي الأمر هذا؟',
    ],
    
    'messages' => [
        'created' => 'تم إنشاء سجل ولي الأمر بنجاح.',
        'updated' => 'تم تحديث سجل ولي الأمر بنجاح.',
        'deleted' => 'تم حذف سجل ولي الأمر بنجاح.',
        'validation_error' => 'يرجى تصحيح الأخطاء أدناه قبل التقديم.',
    ],
];
