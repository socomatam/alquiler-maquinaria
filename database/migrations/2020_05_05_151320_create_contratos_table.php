<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->date('con_fecha_inicio')->nullable();
            $table->date('con_fecha_fin')->nullable();
            $table->double('con_precio')->nullable();
            $table->string('con_detalle_trabajo')->nullable();
            $table->string('con_incidencia')->nullable();
            $table->unsignedBigInteger('alquiler_id')->nullable();
            $table->unsignedBigInteger('maquina_id')->nullable();
            $table->unsignedBigInteger('complemento_id')->nullable();
            $table->foreign('alquiler_id')->references('id')->on('alquileres');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
            $table->foreign('complemento_id')->references('id')->on('complementos');
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
        Schema::dropIfExists('contratos');
    }
}
