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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->string('location')->nullable();
            $table->string('event_type')->default('event');
            $table->string('organizer')->nullable();
            $table->foreignId('class_id')->nullable()->constrained('classes')->nullOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->json('attendees')->nullable();
            $table->boolean('requires_confirmation')->default(false);
            $table->boolean('is_public')->default(false);
            $table->boolean('is_recurring')->default(false);
            $table->string('recurrence_pattern')->nullable();
            $table->date('recurrence_end_date')->nullable();
            $table->json('recurring_days')->nullable();
            $table->string('status')->default('confirmed');
            $table->boolean('send_reminders')->default(false);
            $table->integer('reminder_hours_before')->default(24);
            $table->json('documents')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
