<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('command_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('command');
            $table->json('parameters')->nullable();
            $table->longText('output')->nullable();
            $table->string('status')->default('pending');
            $table->text('error_message')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('command_logs');
    }
};
