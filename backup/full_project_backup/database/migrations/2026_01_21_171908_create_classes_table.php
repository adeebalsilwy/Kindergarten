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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null');
            $table->enum('age_group', ['toddlers', 'preschool', 'pre_k', 'kindergarten'])->nullable();
            $table->integer('capacity')->default(20);
            $table->integer('current_students')->default(0);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('room_number')->nullable();
            $table->decimal('monthly_fee', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
