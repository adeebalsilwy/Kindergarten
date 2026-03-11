<?php

return [
    'title' => 'الأحداث',
    'add_new' => 'إضافة حدث جديد',
    'edit' => 'تعديل الحدث',
    'list' => 'قائمة الأحداث',
    'fields' => [
        'title' => 'العنوان',
        'description' => 'الوصف',
        'start_datetime' => 'تاريخ ووقت البدء',
        'end_datetime' => 'تاريخ ووقت الانتهاء',
        'location' => 'المكان',
        'event_type' => 'نوع الحدث',
        'organizer' => 'المنظم',
        'class_id' => 'معرّف الفصل',
        'teacher_id' => 'معرّف المعلم',
        'attendees' => 'الحضور',
        'requires_confirmation' => 'يتطلب تأكيداً',
        'is_public' => 'عام',
        'is_recurring' => 'متكرر',
        'recurrence_pattern' => 'نمط التكرار',
        'recurrence_end_date' => 'تاريخ انتهاء التكرار',
        'recurring_days' => 'أيام التكرار',
        'status' => 'الحالة',
        'send_reminders' => 'إرسال التذكيرات',
        'reminder_hours_before' => 'ساعات التذكير مقدماً',
        'documents' => 'المستندات',
        'notes' => 'ملاحظات',
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
    'events' => [
        'messages' => [
            'retrieved' => 'تم استرجاع الأحداث بنجاح',
        ],
    ],
];
