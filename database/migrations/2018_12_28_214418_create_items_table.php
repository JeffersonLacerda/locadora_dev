<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number', 50)->unique();
            $table->date('purchase_date');
            $table->integer('movie_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->integer('distributor_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('media_id')->references('id')->on('media')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('distributor_id')->references('id')->on('distributors')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('items', function (Blueprint $table) {    
            $table->dropForeign(['movie_id']);
            $table->dropForeign(['media_id']);
            $table->dropForeign(['distributor_id']);
        });
        Schema::dropIfExists('items');
    }
}
