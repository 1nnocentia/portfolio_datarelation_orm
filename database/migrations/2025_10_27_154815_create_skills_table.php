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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // frontend, backend, database, tools, etc.
            $table->integer('level')->default(1); // 1-5 skill level
            $table->string('icon')->nullable(); // FontAwesome icon class
            $table->string('color')->default('#3b82f6'); // Hex color code
            $table->integer('experience_years')->default(0);
            $table->integer('proficiency')->default(50); // 0-100 percentage
            $table->enum('status', ['active', 'inactive', 'learning'])->default('active');
            $table->integer('order')->default(0); // For sorting
            $table->timestamps();

            $table->index(['category', 'status']);
            $table->index(['proficiency', 'status']);
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
