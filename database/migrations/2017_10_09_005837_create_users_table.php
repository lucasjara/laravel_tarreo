<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('dv');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('user')->unique();
            $table->string('password');
            $table->string('number');
            $table->string('relevant_person');
            $table->string('number_relevant_person');
            $table->string('university_course');
            $table->integer('id_profile')->unsigned();
            $table->foreign('id_profile')->references('id')->on('profiles');
            $table->integer('id_university')->unsigned();
            $table->foreign('id_university')->references('id')->on('universities');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
