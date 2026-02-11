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
        Schema::table('attendances', function (Blueprint $table) {
            // Add check-in and check-out times
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();

            // Add duration calculation
            $table->integer('duration_minutes')->nullable(); // Duration in minutes

            // Add location tracking if needed
            $table->string('check_in_location')->nullable();
            $table->string('check_out_location')->nullable();

            // Add status for more granular tracking
            $table->enum('check_in_status', ['early', 'ontime', 'late'])->nullable();
            $table->enum('check_out_status', ['early', 'ontime', 'late'])->nullable();

            // Add attendance type
            $table->enum('attendance_type', ['full_day', 'half_day', 'morning', 'afternoon'])->default('full_day');

            // Keep the existing indexes and add new ones
            $table->index(['child_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn([
                'check_in_time',
                'check_out_time',
                'duration_minutes',
                'check_in_location',
                'check_out_location',
                'check_in_status',
                'check_out_status',
                'attendance_type',
            ]);
        });
    }
};
