<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sections extends Migration {

    public function up() {

        Schema::create('sections', function (Blueprint $table) {

            $table->increments('section_id');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('course_id')->on('courses');

            $table->string('section_name')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->integer('order')->default(0);

            $table->timestamps();
        });
    }


    public function down() {
        Schema::dropIfExists('sections');
    }
}
