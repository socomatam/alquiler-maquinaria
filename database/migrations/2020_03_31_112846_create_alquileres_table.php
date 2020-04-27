<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->date('alq_fecha_inicio')->nullable();
            $table->date('alq_fecha_fin')->nullable();
            $table->double('alq_precio')->nullable();
            $table->string('alq_detalle_trabajo')->nullable();
            $table->string('alq_incidencia')->nullable();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('trabajador_id');
            //$table->foreign('cliente_id')->references('id')->on('clientes');
            //$table->foreign('trabajador_id')->references('id')->on('trabajadores');
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
        Schema::dropIfExists('alquileres');
    }
}
