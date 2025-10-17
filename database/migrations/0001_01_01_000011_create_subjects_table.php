<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            // Subject information
            $table->string('code')->unique();                  // e.g., IT101
            $table->string('name');                            // e.g., Introduction to Computing
            $table->integer('units')->default(0);
            $table->integer('lecture_hours')->default(0);
            $table->integer('lab_hours')->default(0);

            // Curriculum linkage
            $table->foreignId('program_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('year_level_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('semester', ['Not set', '1st', '2nd', '3rd', 'Summer'])->default('Not set');

            // Optional pre-requisite subjects
            $table->foreignId('prerequisite_subject_id')->nullable()->constrained('subjects')->onDelete('set null');

            $table->enum('subject_status', ['Available', 'Unavailable', 'Restricted'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migr ations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
