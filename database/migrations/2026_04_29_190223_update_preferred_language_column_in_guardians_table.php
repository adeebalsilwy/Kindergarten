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
        // Change the column from ENUM to VARCHAR to support language codes
        Schema::table('guardians', function (Blueprint $table) {
            $table->string('preferred_language', 10)->default('en')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to ENUM with full names
        Schema::table('guardians', function (Blueprint $table) {
            $table->enum('preferred_language', ['english', 'arabic'])->default('english')->change();
        });
    }
};
