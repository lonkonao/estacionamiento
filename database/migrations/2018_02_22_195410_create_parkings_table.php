<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaLlegada');
            $table->string('operador');
            $table->string('patente');
            $table->time('horaLlegada');
            $table->string('codigo');
            $table->string('estado');
            $table->time('horaRetirada');
            $table->integer('total');
            $table->string('tiempoTotal');
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

    }
}
