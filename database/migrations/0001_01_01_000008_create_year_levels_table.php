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
        Schema::create('year_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('level_number');           // numeric representation, e.g., 1, 2, 3, 4
            $table->string('name');                     // e.g., 1st Year, 2nd Year, 3rd Year, 4th Year
            $table->string('description')->nullable(); // e.g. freshmen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_levels');
    }
};
