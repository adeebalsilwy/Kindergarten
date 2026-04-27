<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create table if it doesn't exist
        if (!Schema::hasTable('curricula')) {
            Schema::create('curricula', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
                $table->string('name');
                $table->string('code')->unique();
                $table->text('description')->nullable();
                $table->text('objectives')->nullable();
                $table->text('learning_outcomes')->nullable();
                $table->string('grade_level');
                $table->string('subject_area');
                $table->json('topics')->nullable();
                $table->json('materials_needed')->nullable();
                $table->string('curriculum_type')->default('standard');
                $table->integer('duration_weeks')->nullable();
                $table->json('assessment_methods')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamp('published_at')->nullable();
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->string('status')->default('active');
                $table->json('prerequisites')->nullable();
                $table->text('syllabus')->nullable();
                $table->json('learning_objectives')->nullable();
            });
        } else {
            // Add missing columns if table exists
            Schema::table('curricula', function (Blueprint $table) {
                if (!Schema::hasColumn('curricula', 'deleted_at')) {
                    $table->softDeletes();
                }
                if (!Schema::hasColumn('curricula', 'name')) {
                    $table->string('name');
                }
                if (!Schema::hasColumn('curricula', 'code')) {
                    $table->string('code')->unique();
                }
                if (!Schema::hasColumn('curricula', 'description')) {
                    $table->text('description')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'objectives')) {
                    $table->text('objectives')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'learning_outcomes')) {
                    $table->text('learning_outcomes')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'grade_level')) {
                    $table->string('grade_level');
                }
                if (!Schema::hasColumn('curricula', 'subject_area')) {
                    $table->string('subject_area');
                }
                if (!Schema::hasColumn('curricula', 'topics')) {
                    $table->json('topics')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'materials_needed')) {
                    $table->json('materials_needed')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'curriculum_type')) {
                    $table->string('curriculum_type')->default('standard');
                }
                if (!Schema::hasColumn('curricula', 'duration_weeks')) {
                    $table->integer('duration_weeks')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'assessment_methods')) {
                    $table->json('assessment_methods')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'is_active')) {
                    $table->boolean('is_active')->default(true);
                }
                if (!Schema::hasColumn('curricula', 'published_at')) {
                    $table->timestamp('published_at')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'created_by')) {
                    $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                }
                if (!Schema::hasColumn('curricula', 'status')) {
                    $table->string('status')->default('active');
                }
                if (!Schema::hasColumn('curricula', 'prerequisites')) {
                    $table->json('prerequisites')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'syllabus')) {
                    $table->text('syllabus')->nullable();
                }
                if (!Schema::hasColumn('curricula', 'learning_objectives')) {
                    $table->json('learning_objectives')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
