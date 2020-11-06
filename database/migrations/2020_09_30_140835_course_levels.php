<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseLevels extends Migration {

    public function up() {

        Schema::create('course_levels', function (Blueprint $table) {

            $table->increments('level_id');

            $table->string('level_name');

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();

        });

    }

    public function down() {
        Schema::dropIfExists('course_levels');
    }
}
