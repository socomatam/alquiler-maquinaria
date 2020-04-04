<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquileresMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres_maquinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alquileres_id');
            $table->unsignedBigInteger('maquinas_id');
            $table->foreign('alquileres_id')->references('id')->on('alquileres');
            $table->foreign('maquinas_id')->references('id')->on('maquinas');
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
        Schema::dropIfExists('alquileres_maquinas');
    }
}
