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
        Schema::create('class_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('child_id')->constrained('children')->onDelete('cascade');
            $table->date('enrollment_date')->default(now());
            $table->date('withdrawal_date')->nullable();
            $table->enum('status', ['active', 'inactive', 'completed', 'transferred'])->default('active');
            $table->text('reason')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();

            // Ensure only one active enrollment per class-child combination
            $table->unique(['class_id', 'child_id'], 'class_child_unique_active');
            
            // Add index for performance on common queries
            $table->index(['status']);
            $table->index(['class_id']);
            $table->index(['child_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_enrollments');
    }
};