<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holiday_types', function($table) {
           $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
        
        Schema::table('holidays', function($table) {
           $table->foreign('holiday_type_id')->references('id')->on('holiday_types')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
        
        Schema::table('event_types', function($table) {
           $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('events', function($table) {
           $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
           $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
