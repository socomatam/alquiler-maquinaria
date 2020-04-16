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
            $table->string('cli_nombre_empresa', 100)->nullable();
            $table->string('cli_nif', 9)->nullable();
            $table->string('cli_telefono',15)->nullable();
            $table->string('cli_email')->nullable();
            $table->string('cli_direccion')->nullable();
            $table->string('cli_pais')->nullable();
            $table->string('cli_ciudad')->nullable();
            $table->date('cli_fecha_alta')->nullable();
            $table->string('cli_nombre_contacto', 100)->nullable();
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
