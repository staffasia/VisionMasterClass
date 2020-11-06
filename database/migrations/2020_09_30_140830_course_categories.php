<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseCategories extends Migration {

    public function up() {

        Schema::create('course_categories', function (Blueprint $table) {

            $table->increments('category_id');

            $table->string('category_name');
            $table->string('slug')->nullable();

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();

        });

    }

    public function down() {
        Schema::dropIfExists('course_categories');
    }
}
