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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('column_1')->nullable();
            $table->text('column_1_description')->nullable();
            $table->string('column_2')->nullable();
            $table->text('column_2_description')->nullable();
            $table->string('column_3')->nullable();
            $table->text('column_3_description')->nullable();
            $table->string('column_4')->nullable();
            $table->text('column_4_description')->nullable();
            $table->string('column_5')->nullable();
            $table->text('column_5_description')->nullable();
            $table->string('column_6')->nullable();
            $table->text('column_6_description')->nullable();
            $table->string('column_7')->nullable();
            $table->text('column_7_description')->nullable();
            $table->string('column_8')->nullable();
            $table->text('column_8_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutuses');
    }
};
