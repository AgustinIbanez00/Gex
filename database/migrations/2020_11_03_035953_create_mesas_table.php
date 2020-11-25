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
			$table->unsignedBigInteger('profesor_id')->nullable();
			$table->foreign('profesor_id')->references('id')->on('users');
			$table->unsignedBigInteger('examen_id')->nullable();
			$table->foreign('examen_id')->references('id')->on('examenes');
			$table->dateTime('fecha', 0)->nullable();
			$table->boolean("mostrar_respuestas")->nullable();
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
		Schema::dropIfExists('mesas');
	}
}
