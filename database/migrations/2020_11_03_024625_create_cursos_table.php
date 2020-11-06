<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos', function (Blueprint $table) {
			$table->id();
			$table->string('comision', 2)->nullable();
			$table->integer("cuatrimestre")->nullable();
			$table->integer("ciclo_lectivo")->nullable();
			$table->integer("cant_alumnos")->nullable();
			$table->integer("estado")->default(1);
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
		Schema::dropIfExists('cursos');
	}
}
