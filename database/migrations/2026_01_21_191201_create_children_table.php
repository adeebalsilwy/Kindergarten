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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('class_grade')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('guardians')->onDelete('set null');
            $table->string('photo_path')->nullable();
            $table->decimal('fees_required', 10, 2)->default(0);
            $table->decimal('fees_paid', 10, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
