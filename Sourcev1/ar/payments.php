<?php

return [
    'title' => 'المدفوعات',
    'add_new' => 'إضافة دفعة جديدة',
    'edit' => 'تعديل الدفعة',
    'list' => 'قائمة المدفوعات',
    'fields' => [
        'child_id' => 'معرّف الطفل',
        'fee_id' => 'معرّف الرسوم',
        'amount' => 'المبلغ',
        'payment_date' => 'تاريخ الدفع',
        'payment_method' => 'طريقة الدفع',
        'reference_number' => 'رقم المرجع',
        'status' => 'الحالة',
        'receipt_number' => 'رقم الإيصال',
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
    'payments' => [
        'messages' => [
            'retrieved' => 'تم استرجاع المدفوعات بنجاح',
        ],
        'methods' => [
            'cash' => 'نقدي',
            'bank_transfer' => 'تحويل بنكي',
            'credit_card' => 'بطاقة ائتمان',
            'check' => 'شيك',
        ],
        'status' => [
            'completed' => 'مكتمل',
            'pending' => 'قيد الانتظار',
            'failed' => 'فشل',
        ],
    ],
];
