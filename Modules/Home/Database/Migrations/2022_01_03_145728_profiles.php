<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profiles extends Migration
{
    public function up()
    {
        Schema::dropIfExists('profiles');
        
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('phone')->nullable();
            $table->integer('age')->default(0);
            $table->text('ethnic_origin')->nullable();
            $table->text('marital_status')->nullable();
            $table->text('height')->nullable();
            $table->text('body_type')->nullable();
            $table->text('religion')->nullable();
            $table->text('region')->nullable();
            $table->text('introduction')->nullable();
            $table->text('physical_attributes')->nullable();
            $table->text('hobbies_interests')->nullable();
            $table->text('attitude_earnings')->nullable();
            $table->text('spiritual_family_values')->nullable();
            $table->text('lifestyle')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
