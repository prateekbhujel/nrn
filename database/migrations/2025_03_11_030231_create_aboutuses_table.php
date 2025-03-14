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
            $table->string('organization_name')->nullable();
            $table->text('organization_motto')->nullable();
            $table->string('organization_email')->nullable();
            $table->string('organization_number')->nullable();
            $table->string('about_organisation')->nullable();
            $table->string('organization_address')->nullable();
            $table->text('about_organization')->nullable();
            $table->string('organization_favicon')->nullable();
            $table->string('organization_logo')->nullable();

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
