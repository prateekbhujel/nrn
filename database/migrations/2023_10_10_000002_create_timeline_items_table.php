<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelineItemsTable extends Migration
{
    public function up()
    {
        Schema::create('timeline_items', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('title');
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timeline_items');
    }
}
