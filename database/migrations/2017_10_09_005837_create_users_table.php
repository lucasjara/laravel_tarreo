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
            $table->string('name',40);
            $table->string('last_name',40);
            $table->string('email',80)->unique();
            $table->string('user',15)->unique()->nullable();
            $table->string('password',30);
            $table->string('number',15)->nullable();
            $table->string('relevant_person',80)->nullable();
            $table->string('number_relevant_person',15)->nullable();
            $table->string('university_course')->nullable();
            $table->integer('id_profile')->unsigned();
            $table->foreign('id_profile')->references('id')->on('profiles');
            $table->integer('id_university')->unsigned()->default(1);
            $table->foreign('id_university')->references('id')->on('universities');
            $table->rememberToken();
            $table->timestamps();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
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
