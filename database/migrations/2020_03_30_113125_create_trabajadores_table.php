<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('tra_nombre_trabajador',50);
            $table->string('tra_apellido_1',50)->nullable();
            $table->string('tra_apellido_2',50);
            $table->date('tra_fecha_nacimiento');
            $table->string('tra_telefono',15);
            $table->string('tra_email')->nullable();
            $table->string('tra_dni',9);
            $table->date('tra_fecha_alta')->nullable();
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
        Schema::dropIfExists('trabajadores');
    }
}
