<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasCursosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materias_cursos', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('curso_id')->nullable();
			$table->unsignedBigInteger('materia_id')->nullable();
			$table->foreign('curso_id')->references('id')->on('cursos');
			$table->foreign('materia_id')->references('id')->on('materias');
			$table->date('fecha_inicio', 0);
			$table->date('fecha_fin', 0);
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
		Schema::dropIfExists('materias_cursos');
	}
}
