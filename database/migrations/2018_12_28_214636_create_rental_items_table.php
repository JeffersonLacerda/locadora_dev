<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->double('item_price', 8, 2);
            $table->double('discount', 8, 2)->default(0);;
            $table->double('surcharge', 8, 2)->default(0);
            $table->double('rental_price', 8, 2);
            $table->integer('return_deadline')->unsigned();
            $table->integer('return_deadline_extension')->unsigned();
            $table->date('expected_return_date');
            $table->date('return_date')->nullable();
            $table->integer('return_user')->unsigned()->nullable();
            $table->foreign('rental_id')->references('id')->on('rentals')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('return_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('rental_items', function (Blueprint $table) {    
            $table->dropForeign(['rental_id']);
            $table->dropForeign(['item_id']);
            $table->dropForeign(['return_user']);
        });
        Schema::dropIfExists('rental_items');
    }
}
