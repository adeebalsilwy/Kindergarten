<?php

return [
    'title' => 'الأطفال',
    'add_new' => 'إضافة طفل جديد',
    'edit' => 'تعديل الطفل',
    'list' => 'قائمة الأطفال',
    
    // Tabs
    'tabs' => [
        'basic_info' => 'المعلومات الأساسية',
        'parents' => 'معلومات الوالدين',
        'medical' => 'المعلومات الطبية',
        'enrollment' => 'التسجيل والرسوم',
    ],
    
    // Sections
    'sections' => [
        'personal_info' => 'المعلومات الشخصية',
        'class_assignment' => 'تعيين الصف',
        'parent_info' => 'معلومات الوالد/الوصي',
        'emergency_contact' => 'جهة الاتصال في حالات الطوارئ',
        'medical_info' => 'المعلومات الطبية',
        'financial_info' => 'المعلومات المالية',
        'enrollment_info' => 'معلومات التسجيل',
    ],
    
    // Descriptions
    'descriptions' => [
        'personal_info' => 'أدخل المعلومات الشخصية الأساسية للطفل بما في ذلك الاسم وتاريخ الميلاد وتفاصيل الاتصال.',
        'class_assignment' => 'قم بتعيين الطفل إلى الصف المناسب بناءً على عمره ومستوى الصف.',
        'parent_info' => 'حدد الوالد/الوصي الرئيسي والوالد/الوصي الثانوي الاختياري للطفل.',
        'emergency_contact' => 'قم بتوفير معلومات الاتصال في حالات الطوارئ للمساعدة الفورية عند الحاجة.',
        'medical_info' => 'سجل المعلومات الطبية المهمة بما في ذلك الحالات والأمراض والعلاجات.',
        'financial_info' => 'قم بإعداد المتطلبات المالية وتتبع المدفوعات لتسجيل الطفل.',
        'enrollment_info' => 'إدارة حالة التسجيل والتواريخ ومعلومات تتبع الحضور.',
    ],
    
    'fields' => [
        'name' => 'الاسم الكامل',
        'dob' => 'تاريخ الميلاد',
        'gender' => 'الجنس',
        'class_id' => 'الصف المُعين',
        'parent_id' => 'الوالد/الوصي الرئيسي',
        'second_parent_id' => 'الوالد/الوصي الثانوي',
        'photo_path' => 'صورة الطفل',
        'fees_required' => 'الرسوم المطلوبة',
        'fees_paid' => 'الرسوم المدفوعة',
        'emergency_contact_name' => 'اسم جهة الاتصال في حالات الطوارئ',
        'emergency_contact_phone' => 'هاتف جهة الاتصال في حالات الطوارئ',
        'emergency_contact_relation' => 'العلاقة بالطفل',
        'medical_conditions' => 'الحالات الطبية',
        'allergies' => 'الحساسية',
        'medications' => 'الأدوية الحالية',
        'blood_type' => 'فئة الدم',
        'enrollment_date' => 'تاريخ التسجيل',
        'expected_graduation_date' => 'تاريخ التخرج المتوقع',
        'last_attended_at' => 'آخر حضور',
        'enrollment_status' => 'حالة التسجيل',
        'nationality' => 'الجنسية',
        'religion' => 'الدين',
        'special_needs' => 'الاحتياجات الخاصة',
    ],
    
    // Placeholders
    'placeholders' => [
        'name' => 'أدخل الاسم الكامل للطفل',
        'nationality' => 'أدخل الجنسية',
        'religion' => 'أدخل الدين',
        'emergency_contact_name' => 'أدخل اسم جهة الاتصال في حالات الطوارئ',
        'emergency_contact_phone' => 'أدخل هاتف جهة الاتصال في حالات الطوارئ',
        'emergency_contact_relation' => 'أدخل العلاقة (مثال: أم، أب، جدة)',
        'medical_conditions' => 'اذكر أي حالات طبية أو مشاكل صحية',
        'allergies' => 'اذكر أي حساسية معروفة',
        'medications' => 'اذكر الأدوية الحالية',
        'special_needs' => 'وصف أي احتياجات خاصة أو متطلبات',
    ],
    
    // Help text
    'help' => [
        'second_parent_optional' => 'اختياري: اختر إذا كان هناك والد/وصي ثانوي',
    ],
    
    'actions' => [
        'save' => 'حفظ الطفل',
        'cancel' => 'إلغاء',
        'update' => 'تحديث الطفل',
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'confirm_delete' => 'هل أنت متأكد من حذف سجل هذا الطفل؟',
    ],
    
    'messages' => [
        'created' => 'تم إنشاء سجل الطفل بنجاح.',
        'updated' => 'تم تحديث سجل الطفل بنجاح.',
        'deleted' => 'تم حذف سجل الطفل بنجاح.',
        'validation_error' => 'يرجى تصحيح الأخطاء أدناه قبل التقديم.',
        'fill_demo_data' => 'تعبئة البيانات التجريبية',
        'demo_data_filled' => 'تم تعبئة البيانات التجريبية بنجاح!',
    ],
];
