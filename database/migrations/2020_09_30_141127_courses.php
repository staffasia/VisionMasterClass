<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Courses extends Migration {

    public function up() {

        Schema::create('courses', function (Blueprint $table) {

            $table->increments('course_id');

            $table->bigInteger('instructor_id')->unsigned();
            $table->foreign('instructor_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('course_categories');

            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('level_id')->on('course_levels');

            $table->string('course_name');
            $table->string('slug')->nullable();
            $table->longText('course_title')->nullable();

            $table->longText('course_overview')->nullable();
            $table->longText('what_will_i_learn')->nullable();
            $table->longText('course_requirement')->nullable();

            $table->enum('free_course', [0, 1])->default(0);
            $table->double('price')->default(0);

            $table->enum('discount_available', [0, 1])->default(0);
            $table->double('discount')->default(0);
            $table->double('discount_percentage')->default(0);
            $table->enum('discount_amount_type', ['cash', 'percentage'])->default('percentage');

            $table->string('course_image')->default('default_course.jpg');

            $table->enum('course_status', ['draft', 'published', 'unpublished'])->default('draft');

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();

        });

    }


    public function down() {
        Schema::dropIfExists('courses');
    }
}
