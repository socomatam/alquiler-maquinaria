<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilereMaquinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquilere_maquina', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger('alquilere_id');
            $table->unsignedBigInteger('maquina_id');
            $table->foreign('alquilere_id')->references('id')->on('alquileres');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
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
        Schema::dropIfExists('alquilere_maquina');
    }
}
