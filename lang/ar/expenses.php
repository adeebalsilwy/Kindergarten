<?php

return [
    'title' => 'المصروفات',
    'add_new' => 'إضافة مصروف جديد',
    'edit' => 'تعديل المصروف',
    'list' => 'قائمة المصروفات',
    'fields' => [
        'title' => 'العنوان',
        'description' => 'الوصف',
        'amount' => 'المبلغ',
        'expense_date' => 'تاريخ المصروف',
        'vendor' => 'المورد',
        'receipt_number' => 'رقم الإيصال',
        'payment_method' => 'طريقة الدفع',
        'reference_number' => 'رقم المرجع',
        'status' => 'الحالة',
        'created_by' => 'تم الإنشاء بواسطة',
        'assigned_to' => 'مخصص لـ',
    ],
    'actions' => [
        'save' => 'حفظ',
        'cancel' => 'إلغاء',
        'update' => 'تحديث',
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'confirm_delete' => 'هل أنت متأكد؟',
    ],
    'messages' => [
        'created' => 'تم إنشاء السجل بنجاح.',
        'updated' => 'تم تحديث السجل بنجاح.',
        'deleted' => 'تم حذف السجل بنجاح.',
    ],
    'expenses' => [
        'messages' => [
            'retrieved' => 'تم استرجاع المصروفات بنجاح',
        ],
        'categories' => [
            'utilities' => 'الخدمات العامة',
            'supplies' => 'اللوازم',
            'salaries' => 'الرواتب',
            'maintenance' => 'الصيانة',
            'other' => 'أخرى',
            'equipment' => 'المعدات',
            'transportation' => 'النقل',
        ],
        'status' => [
            'paid' => '',
            'pending' => '',
        ],
    ],
];
