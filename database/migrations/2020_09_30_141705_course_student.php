<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseStudent extends Migration {

    public function up() {

        Schema::create('course_student', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('course_id')->on('courses');

            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('users');

            $table->double('completed')->default(0);
            $table->integer('status')->default(0);
            $table->enum('is_rated', [0, 1])->default(0);
            $table->longText('rating')->nullable();

            $table->timestamps();
        });

    }

    public function down() {
        Schema::dropIfExists('course_student');
    }
}
