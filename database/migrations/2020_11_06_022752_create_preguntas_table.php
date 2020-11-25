<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preguntas', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('examen_id')->nullable();
			$table->foreign('examen_id')->references('id')->on('examenes');
			$table->text('valor')->nullable();
			$table->integer("tipo")->nullable();
			$table->integer("puntos")->default(1);
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
		Schema::dropIfExists('preguntas');
	}
}
