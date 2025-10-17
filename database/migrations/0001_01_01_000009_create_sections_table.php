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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // e.g., 1-A, 2-B
            $table->foreignId('program_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('year_level_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('capacity')->default(40);    // max students in section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
