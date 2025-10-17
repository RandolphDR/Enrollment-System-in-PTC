<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    // DEVELOPER NOTE: IF SOME PROBLEM EXIST TRY TO PUT NULLABLE ON JSONS ATTRIBUTES
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal Information
            $table->string('student_no')->unique(); // e.g., 2022-5090
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlenname')->nullable();
            $table->string('suffix')->nullable(); // e.g., Jr., III
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date')->nullable();
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Divorced', 'Prefer not to say'])->default('Prefer not to say');
            $table->json('birthplace');

            // Contact Information
            $table->string('phone_no')->nullable();
            $table->json('address');
            $table->json('guardian');

            // Academic Information
            $table->foreignId('program_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('year_level_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['Enrolled', 'Not Enrolled', 'Graduated', 'Dropped'])->default('Not Enrolled');
            $table->boolean('is_irregular')->default(false);

            // Employment
            $table->foreignId('employment_id')->nullable()->constrained('employments')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
