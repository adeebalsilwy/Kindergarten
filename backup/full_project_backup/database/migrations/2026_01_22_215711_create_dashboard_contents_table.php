<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dashboard_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section')->comment('Dashboard section identifier');
            $table->string('key')->comment('Content key for the specific element');
            $table->json('content')->comment('JSON content for multiple languages');
            $table->boolean('is_active')->default(true)->comment('Whether the content is active');
            $table->integer('order')->default(0)->comment('Order of display');
            $table->json('metadata')->nullable()->comment('Additional metadata');
            $table->timestamps();
        });

        // Insert initial dashboard content
        DB::table('dashboard_contents')->insert([
            [
                'section' => 'welcome_section',
                'key' => 'title',
                'content' => json_encode(['en' => 'Welcome to Kindergarten Management System', 'ar' => 'مرحباً بك في نظام إدارة رياض الأطفال']),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'text']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'welcome_section',
                'key' => 'subtitle',
                'content' => json_encode(['en' => 'Manage your kindergarten efficiently', 'ar' => 'إدارة رياض الأطفال الخاصة بك بشكل فعال']),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'text']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'stats_cards',
                'key' => 'children_enrolled_label',
                'content' => json_encode(['en' => 'Children Enrolled', 'ar' => 'الأطفال المسجلين']),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'label']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'stats_cards',
                'key' => 'teachers_label',
                'content' => json_encode(['en' => 'Qualified Teachers', 'ar' => 'المعلمون المؤهلون']),
                'is_active' => true,
                'order' => 2,
                'metadata' => json_encode(['type' => 'label']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'recent_activities',
                'key' => 'title',
                'content' => json_encode(['en' => 'Recent Activities', 'ar' => 'الأنشطة الأخيرة']),
                'is_active' => true,
                'order' => 1,
                'metadata' => json_encode(['type' => 'title']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_contents');
    }
};
