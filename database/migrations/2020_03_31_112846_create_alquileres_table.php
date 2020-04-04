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
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('trabajador_id')->unsigned()->nullable();
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
