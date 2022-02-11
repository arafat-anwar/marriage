<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->bigInteger('role_id')->unsigned();
            $table->integer('is_developer')->default(1);
            $table->integer('gender')->default(1);
            $table->integer('sound')->default(1);
            $table->text('image')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->integer('relation')->default(0);
            $table->integer('status')->default(1);
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
