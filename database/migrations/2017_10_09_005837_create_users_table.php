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
            $table->string('rut')->nullable();
            $table->string('dv')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('user')->unique()->nullable();
            $table->string('password');
            $table->string('number')->nullable();
            $table->string('relevant_person')->nullable();
            $table->string('number_relevant_person')->nullable();
            $table->string('university_course')->nullable();
            $table->integer('id_profile')->unsigned()->default(2);
            $table->foreign('id_profile')->references('id')->on('profiles');
            $table->integer('id_university')->unsigned()->default(1);
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
