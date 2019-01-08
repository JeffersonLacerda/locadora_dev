<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->integer('reservation_user')->unsigned();
            $table->boolean('expired')->default(false);
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('media_id')->references('id')->on('media')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('reservation_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('reservations', function (Blueprint $table) {    
            $table->dropForeign(['client_id']);
            $table->dropForeign(['movie_id']);
            $table->dropForeign(['media_id']);
            $table->dropForeign(['reservation_user']);
        });
        Schema::dropIfExists('reservations');
    }
}
