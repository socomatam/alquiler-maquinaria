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
            $table->double('maq_peso')->nullabe();
            $table->double('maq_dimension_alto')->nullabe();
            $table->double('maq_dimension_largo')->nullabe();
            $table->double('maq_dimension_ancho')->nullabe();

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
