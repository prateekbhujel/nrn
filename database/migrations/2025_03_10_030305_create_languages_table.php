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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');         // e.g., English, French, Nepali
            $table->string('locale');       // e.g., en, fr, np, ja
            $table->string('icon')->nullable(); // e.g., "fas fa-flag", or any FontAwesome icon class

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
