<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_alumnos', function (Blueprint $table) {
					$table->id();
					$table->unsignedBigInteger('alumno_id')->nullable();
					$table->foreign("alumno_id")->references("id")->on("users");
					$table->unsignedBigInteger('respuesta_id')->nullable();
					$table->foreign("respuesta_id")->references("id")->on("respuestas");
					$table->string("valor")->nullable();
					$table->boolean("estado")->default(1);
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
        Schema::dropIfExists('respuestas_alumnos');
    }
}
