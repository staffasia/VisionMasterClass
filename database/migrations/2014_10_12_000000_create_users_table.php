<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    public function up() {

        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->string('role')->default("student");

            $table->longText('user_description')->nullable();
            $table->string('phone')->nullable();
            $table->string('user_img')->default("default_user.png");

            $table->integer('status')->default(1);
            $table->rememberToken();

            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}
