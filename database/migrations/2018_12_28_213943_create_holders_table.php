<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 11)->unique();
            $table->string('place');
            $table->integer('number')->unsigned();
            $table->string('complement');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('workplace');
            $table->string('home_phone', 14);
            $table->string('cell_phone', 14);
            $table->string('work_phone', 14);
            $table->integer('client_id')->unsigned();
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
        Schema::dropIfExists('holders');
    }
}
