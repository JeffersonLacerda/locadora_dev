<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 150);
            $table->enum('gender', ['Masculino', 'Feminino']);
            $table->date('birth_date');
            $table->enum('type', ['Titular', 'Dependente']);
            $table->integer('holder_id')->unsigned()->nullable();
            $table->foreign('holder_id')->references('id')->on('holders')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::table('holders', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table){
            $table->dropForeign(['holder_id']);
        });
        Schema::table('holders', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });
        Schema::dropIfExists('clients');
    }
}
