<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tmdb_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('original_title');
            $table->string('poster');
            $table->string('country');
            $table->integer('year');
            $table->string('direction');
            $table->text('cast');
            $table->text('synopsis');
            $table->integer('duraction');
            $table->integer('type_id')->unsigned();
            /* $table->integer('distributor_id')->unsigned(); */
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('restrict');
            /* $table->foreign('distributor_id')->references('id')->on('distributors')->onUpdate('cascade')->onDelete('restrict'); */
            $table->timestamps();
        });

        Schema::create('genre_movie', function (Blueprint $table) {
            $table->integer('genre_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genre_movie', function (Blueprint $table) {    
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['movie_id']);
        });
        Schema::table('movies', function (Blueprint $table) {    
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['type_id']);
            /* $table->dropForeign(['distributor_id']); */
        });

        Schema::dropIfExists('genre_movie');
        Schema::dropIfExists('movies');
    }
}
