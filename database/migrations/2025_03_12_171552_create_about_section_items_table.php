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
        Schema::create('about_section_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_section_id')
                    ->constrained('about_sections')
                    ->onDelete('cascade');
            $table->string('item_title')->nullable(); // optional title for the bullet point
            $table->text('content');               // bullet point content
            $table->string('icon')->nullable();    // optional icon (e.g. for core values)
            $table->integer('order')->default(0);  // order of display
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_section_items');
    }
};
