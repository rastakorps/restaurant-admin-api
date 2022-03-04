<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSaucerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_saucer', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('saucer_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');
            $table->foreign('saucer_id')->references('id')->on('saucers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_saucer');
    }
}
