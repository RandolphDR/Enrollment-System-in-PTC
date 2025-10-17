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
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->id();

            // Links
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('instructor_id')->nullable()->constrained('employees')->onDelete('set null');

            // Academic session info
            $table->foreignId('program_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('year_level_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            $table->string('school_year');      // e.g., 2025–2026
            $table->enum('semester', ['Not set', '1st', '2nd', '3rd', 'Summer'])->default('Not set');

            // Enrollment status
            $table->enum('status', ['Enrolled', 'Completed', 'Dropped'])->default('Enrolled');

            // Irregular subjects
            $table->boolean('is_irregular')->default(false);

            // Grades
            $table->decimal('prelim', 5, 2)->nullable();
            $table->decimal('midterm', 5, 2)->nullable();
            $table->decimal('final', 5, 2)->nullable();
            $table->decimal('final_grade', 5, 2)->nullable();
            $table->string('remarks')->nullable();

            $table->timestamps();

            // Prevent duplicate entries for the same subject & student per school year & semester
            $table->unique(['student_id', 'subject_id', 'school_year', 'semester'], 'unique_student_subject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subjects');
    }
};
