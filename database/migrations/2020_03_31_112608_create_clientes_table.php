<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cli_nombre_empresa', 100);
            $table->string('cli_nif', 9);
            $table->string('cli_telefono',15);
            $table->string('cli_email');
            $table->string('cli_direccion');
            $table->string('cli_pais');
            $table->string('cli_ciudad');
            $table->date('cli_fecha_alta');
            $table->string('cli_nombre_contacto', 100);
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
        Schema::dropIfExists('clientes');
    }
}
