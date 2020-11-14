<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LectureContents extends Migration {

    public function up() {

        Schema::create('lecture_contents', function (Blueprint $table) {

            $table->increments('content_id');

            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('section_id')->on('sections')->onDelete('cascade');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');

            $table->string('content_title')->nullable();
            $table->longText('content');
            $table->string('mime_type');

            $table->timestamps();

        });

    }

    public function down() {
        Schema::dropIfExists('lecture_contents');

    }
}
