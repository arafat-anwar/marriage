<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTypes extends Migration
{
    public function up()
    {
        Schema::dropIfExists('event_types');
        
        Schema::create('event_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('desc')->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('event_types');
    }
}
