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
        Schema::table('classes', function (Blueprint $table) {
            // Add foreign key constraint if it doesn't exist
            if (!Schema::hasColumn('classes', 'grade_level_id') || 
                !DB::select("SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'classes' AND COLUMN_NAME = 'grade_level_id' AND CONSTRAINT_NAME != 'PRIMARY'")) {
                
                $table->foreign('grade_level_id')->references('id')->on('grade_levels')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign(['grade_level_id']);
        });
    }
};