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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('instructions')->nullable();
            $table->foreignId('class_id')->nullable()->constrained('classes')->nullOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->foreignId('curriculum_id')->nullable()->constrained('curricula')->nullOnDelete();
            $table->date('scheduled_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('activity_type')->default('educational');
            $table->string('difficulty_level')->default('easy');
            $table->json('required_materials')->nullable();
            $table->integer('estimated_duration')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_active')->default(true);
            $table->json('learning_objectives')->nullable();
            $table->json('outcomes')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
