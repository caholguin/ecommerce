<?php

use App\Models\Orden;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('contacto');
            $table->string('telefono');


            $table->enum('estado',[Orden::PENDIENTE,Orden::RECIBIDO,Orden::ENVIADO,Orden::ENTREGADO,Orden::ANULADO])->default(Orden::PENDIENTE);
            $table->enum('tipo_envio',[1,2]);
            $table->float('costo');
            $table->float('total');
            $table->json('contenido');

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->foreign('ciudad_id')->references('id')->on('ciudades');

            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos');

            $table->string('direccion')->nullable();
            $table->string('referencia')->nullable();


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
        Schema::dropIfExists('ordens');
    }
}
