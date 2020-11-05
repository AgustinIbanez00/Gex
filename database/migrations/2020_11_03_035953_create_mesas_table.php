<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mesas', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->dateTime('fecha', 0);
			$table->boolean("mostrar_respuestas")->nullable();
			//FKs
			$table->unsignedBigInteger('profesor_id')->nullable();
			$table->foreign('profesor_id')->references('id')->on('users');
			$table->unsignedBigInteger('alumno_id')->nullable();
			$table->foreign('alumno_id')->references('id')->on('users');
			$table->unsignedBigInteger('examen_id')->nullable();
			$table->foreign('examen_id')->references('id')->on('examenes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('mesas');
	}
}
