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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable(); // e.g., consumable, reusable, digital
            $table->integer('quantity_available')->default(0);
            $table->integer('quantity_required')->default(0);
            $table->decimal('unit_cost', 10, 2)->nullable();
            $table->string('supplier')->nullable();
            $table->string('storage_location')->nullable();
            $table->boolean('is_consumable')->default(false);
            $table->boolean('is_digital')->default(false);
            $table->json('specifications')->nullable(); // Additional specs as JSON
            $table->boolean('is_active')->default(true);
            $table->timestamp('purchased_at')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create pivot table for curriculum_materials relationship
        Schema::create('curriculum_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->constrained('curricula')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('materials')->onDelete('cascade');
            $table->integer('quantity_required')->default(1);
            $table->text('usage_instructions')->nullable();
            $table->timestamps();
            
            $table->unique(['curriculum_id', 'material_id']); // Prevent duplicate entries
        });

        // Create pivot table for activity_materials relationship
        Schema::create('activity_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('materials')->onDelete('cascade');
            $table->integer('quantity_required')->default(1);
            $table->text('usage_instructions')->nullable();
            $table->timestamps();
            
            $table->unique(['activity_id', 'material_id']); // Prevent duplicate entries
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_materials');
        Schema::dropIfExists('curriculum_materials');
        Schema::dropIfExists('materials');
    }
};