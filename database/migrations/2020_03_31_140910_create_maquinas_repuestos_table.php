<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinasRepuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas_repuestos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maquinas_id');
            $table->unsignedBigInteger('repuestos_id');
            $table->foreign('maquinas_id')->references('id')->on('maquinas');
            $table->foreign('repuestos_id')->references('id')->on('repuestos');
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
        Schema::dropIfExists('maquinas_repuestos');
    }
}
