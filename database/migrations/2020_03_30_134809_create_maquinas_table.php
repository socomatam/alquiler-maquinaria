<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas', function (Blueprint $table) {
            $table->id();
            $table->string('maq_marca')->nullable();
            $table->string('maq_modelo')->nullable();
            $table->string('maq_traslacion')->nullable();
            $table->double('maq_peso')->nullable();
            $table->float('maq_dimension_alto')->nullable();
            $table->float('maq_dimension_largo')->nullable();
            $table->float('maq_dimension_ancho')->nullable();
            $table->string('maq_categoria')->nullable();
            $table->string('maq_tipo')->nullable();
            $table->string('maq_estado')->nullable();
            $table->double('maq_precio_dia')->nullable();
            $table->string('maq_seguro',15)->nullable();
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
        Schema::dropIfExists('maquinas');
    }
}
