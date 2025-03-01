<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardMembersTable extends Migration
{
    public function up()
    {
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('type');
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->text('areas_of_expertise')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('board_members');
    }
}
