<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dashboardContents = [
            // Welcome Section
            [
                'section' => 'welcome_section',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Welcome to Kindergarten Management System',
                    'ar' => 'مرحباً بك في نظام إدارة رياض الأطفال',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'text']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Stats Cards
            [
                'section' => 'stats_cards',
                'key' => 'children_enrolled_label',
                'content' => json_encode([
                    'en' => 'Children Enrolled',
                    'ar' => 'الأطفال المسجلين',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'label']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'stats_cards',
                'key' => 'teachers_label',
                'content' => json_encode([
                    'en' => 'Qualified Teachers',
                    'ar' => 'المعلمون المؤهلون',
                ]),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'label']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'stats_cards',
                'key' => 'classes_label',
                'content' => json_encode([
                    'en' => 'Classes Available',
                    'ar' => 'الفصول المتاحة',
                ]),
                'is_active' => true,
                'order' => 3,
                'metadata' => json_encode(['type' => 'label']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'stats_cards',
                'key' => 'revenue_label',
                'content' => json_encode([
                    'en' => 'Monthly Revenue',
                    'ar' => 'الإيرادات الشهرية',
                ]),
                'is_active' => true,
                'order' => 4,
                'metadata' => json_encode(['type' => 'label']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Attendance Chart
            [
                'section' => 'attendance_chart',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Student Attendance',
                    'ar' => 'حضور الطلاب',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Recent Activities
            [
                'section' => 'recent_activities',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Recent Activities',
                    'ar' => 'الأنشطة الأخيرة',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_1_title',
                'content' => json_encode([
                    'en' => 'New Student Enrollment',
                    'ar' => 'تسجيل طالب جديد',
                ]),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'activity']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_1_desc',
                'content' => json_encode([
                    'en' => 'Student joined the class',
                    'ar' => 'انضم الطالب إلى الفصل',
                ]),
                'is_active' => true,
                'order' => 3,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_2_title',
                'content' => json_encode([
                    'en' => 'Teacher Added',
                    'ar' => 'تم إضافة معلم',
                ]),
                'is_active' => true,
                'order' => 4,
                'metadata' => json_encode(['type' => 'activity']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_2_desc',
                'content' => json_encode([
                    'en' => 'New teacher joined',
                    'ar' => 'انضم معلم جديد',
                ]),
                'is_active' => true,
                'order' => 5,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_3_title',
                'content' => json_encode([
                    'en' => 'Payment Received',
                    'ar' => 'تم استلام الدفع',
                ]),
                'is_active' => true,
                'order' => 6,
                'metadata' => json_encode(['type' => 'activity']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_3_desc',
                'content' => json_encode([
                    'en' => 'Monthly fee payment',
                    'ar' => 'دفع الرسوم الشهرية',
                ]),
                'is_active' => true,
                'order' => 7,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_4_title',
                'content' => json_encode([
                    'en' => 'Event Announcement',
                    'ar' => 'إعلان الحدث',
                ]),
                'is_active' => true,
                'order' => 8,
                'metadata' => json_encode(['type' => 'activity']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'activity_4_desc',
                'content' => json_encode([
                    'en' => 'Upcoming school event',
                    'ar' => 'حدث مدرسي قادم',
                ]),
                'is_active' => true,
                'order' => 9,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Monthly Summary
            [
                'section' => 'monthly_summary',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Monthly Financial Summary',
                    'ar' => 'ملخص المالية الشهرية',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Important Updates
            [
                'section' => 'important_updates',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Important Updates',
                    'ar' => 'التحديثات المهمة',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'important_updates',
                'key' => 'update_1_title',
                'content' => json_encode([
                    'en' => 'New Policy Update',
                    'ar' => 'تحديث السياسة الجديدة',
                ]),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'update']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'important_updates',
                'key' => 'update_1_desc',
                'content' => json_encode([
                    'en' => 'Updated safety procedures',
                    'ar' => 'إجراءات السلامة المحدثة',
                ]),
                'is_active' => true,
                'order' => 3,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'important_updates',
                'key' => 'update_2_title',
                'content' => json_encode([
                    'en' => 'Holiday Schedule',
                    'ar' => 'جدول العطلات',
                ]),
                'is_active' => true,
                'order' => 4,
                'metadata' => json_encode(['type' => 'update']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'important_updates',
                'key' => 'update_2_desc',
                'content' => json_encode([
                    'en' => 'Upcoming holidays',
                    'ar' => 'العطلات القادمة',
                ]),
                'is_active' => true,
                'order' => 5,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'important_updates',
                'key' => 'update_3_title',
                'content' => json_encode([
                    'en' => 'Maintenance Notice',
                    'ar' => 'إشعار الصيانة',
                ]),
                'is_active' => true,
                'order' => 6,
                'metadata' => json_encode(['type' => 'update']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'important_updates',
                'key' => 'update_3_desc',
                'content' => json_encode([
                    'en' => 'Facility maintenance',
                    'ar' => 'صيانة المرافق',
                ]),
                'is_active' => true,
                'order' => 7,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Parents Communication
            [
                'section' => 'parents_communication',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Parents Communication',
                    'ar' => 'التواصل مع الآباء',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'parents_communication',
                'key' => 'comm_1_title',
                'content' => json_encode([
                    'en' => 'New Message',
                    'ar' => 'رسالة جديدة',
                ]),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'communication']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'parents_communication',
                'key' => 'comm_1_desc',
                'content' => json_encode([
                    'en' => 'Parent inquiry received',
                    'ar' => 'تم استلام استفسار الوالدين',
                ]),
                'is_active' => true,
                'order' => 3,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'parents_communication',
                'key' => 'comm_2_title',
                'content' => json_encode([
                    'en' => 'Newsletter Sent',
                    'ar' => 'تم إرسال النشرة الإخبارية',
                ]),
                'is_active' => true,
                'order' => 4,
                'metadata' => json_encode(['type' => 'communication']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'parents_communication',
                'key' => 'comm_2_desc',
                'content' => json_encode([
                    'en' => 'Weekly newsletter distributed',
                    'ar' => 'تم توزيع النشرة الأسبوعية',
                ]),
                'is_active' => true,
                'order' => 5,
                'metadata' => json_encode(['type' => 'description']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Quick Actions
            [
                'section' => 'quick_actions',
                'key' => 'title',
                'content' => json_encode([
                    'en' => 'Quick Actions',
                    'ar' => 'الإجراءات السريعة',
                ]),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'quick_actions',
                'key' => 'action_1_label',
                'content' => json_encode([
                    'en' => 'Add Child',
                    'ar' => 'إضافة طفل',
                ]),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'button']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'quick_actions',
                'key' => 'action_2_label',
                'content' => json_encode([
                    'en' => 'Add Teacher',
                    'ar' => 'إضافة معلم',
                ]),
                'is_active' => true,
                'order' => 3,
                'metadata' => json_encode(['type' => 'button']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'quick_actions',
                'key' => 'action_3_label',
                'content' => json_encode([
                    'en' => 'Add Class',
                    'ar' => 'إضافة فصل',
                ]),
                'is_active' => true,
                'order' => 4,
                'metadata' => json_encode(['type' => 'button']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'quick_actions',
                'key' => 'action_4_label',
                'content' => json_encode([
                    'en' => 'Financial Reports',
                    'ar' => 'التقارير المالية',
                ]),
                'is_active' => true,
                'order' => 5,
                'metadata' => json_encode(['type' => 'button']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Clear existing data and insert new data
        DB::table('dashboard_contents')->truncate();
        DB::table('dashboard_contents')->insert($dashboardContents);
    }
}
