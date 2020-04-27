<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplementosMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complementos_maquinas', function (Blueprint $table) {
            
            $table->unsignedBigInteger('maquinas_id');
            $table->unsignedBigInteger('complementos_id');
            $table->foreign('maquinas_id')->references('id')->on('maquinas');
            $table->foreign('complementos_id')->references('id')->on('complementos');
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
        Schema::dropIfExists('complementos_maquinas');
    }
}
