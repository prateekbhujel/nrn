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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('translatable_id')->nullable();
            $table->string('translation_key')->nullable(); // e.g., sidebar.dashboard, form.title
            $table->string('locale')->nullable();          // e.g., en, fr, np
            $table->text('value');             // The translated text
            $table->timestamps();

            // Ensure each key for a given locale is unique
            $table->unique(['translation_key', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
