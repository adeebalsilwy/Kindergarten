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
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
