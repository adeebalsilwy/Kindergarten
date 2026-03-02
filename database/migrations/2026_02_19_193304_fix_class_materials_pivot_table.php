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
        // Check if the old column exists before renaming
        if (Schema::hasTable('class_materials') && Schema::hasColumn('class_materials', 'classes_id')) {
            Schema::table('class_materials', function (Blueprint $table) {
                // Add the new column
                $table->unsignedBigInteger('class_id')->nullable()->after('material_id');
            });
            
            // Copy data from old column to new column
            \DB::statement('UPDATE class_materials SET class_id = classes_id WHERE classes_id IS NOT NULL');
            
            // Drop the old column
            Schema::table('class_materials', function (Blueprint $table) {
                $table->dropColumn('classes_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back the old column
        if (Schema::hasTable('class_materials') && Schema::hasColumn('class_materials', 'class_id')) {
            Schema::table('class_materials', function (Blueprint $table) {
                $table->unsignedBigInteger('classes_id')->nullable()->after('material_id');
            });
            
            // Copy data back
            \DB::statement('UPDATE class_materials SET classes_id = class_id WHERE class_id IS NOT NULL');
            
            // Drop the new column
            Schema::table('class_materials', function (Blueprint $table) {
                $table->dropColumn('class_id');
            });
        }
    }
};