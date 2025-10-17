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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->enum('employment_status', [
                'Employed',
                'Unemployed',
                'Part-Time',
                'Full-Time',
                'Self-Employed',
                'Contractual',
                'Retired',
            ])->default('Unemployed');
            $table->string('work_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
