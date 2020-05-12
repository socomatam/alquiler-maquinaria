<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplementoContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complemento_contratos', function (Blueprint $table) {
            
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('complemento_id');
            $table->foreign('contrato_id')->references('id')->on('contratos');
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
        Schema::dropIfExists('complemento_contratos');
    }
}
