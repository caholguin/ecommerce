<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorTallaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_talla', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colores')->onDelete('cascade');

            $table->unsignedBigInteger('talla_id');
            $table->foreign('talla_id')->references('id')->on('tallas')->onDelete('cascade');

            $table->integer('cantidad');

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
        Schema::dropIfExists('color_talla');
    }
}
