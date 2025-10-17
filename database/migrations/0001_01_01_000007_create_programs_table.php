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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();           // e.g., BSIT, BSHM
            $table->string('name');                     // e.g., Bachelor of Science in Information Technology
            $table->string('description')->nullable();  // optional description
            $table->integer('duration_years')->default(0);
            $table->enum('status', ['Available', 'Unavailable', 'Restricted'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
