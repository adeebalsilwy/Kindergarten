<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tetsttablres1', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
                        $table->string('age')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tetsttablres1');
    }
};
