<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaucersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saucers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->unsignedDecimal('price', $precision = 10, $scale = 2);
            $table->char('status')->default(1);
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
        Schema::dropIfExists('saucers');
    }
}
