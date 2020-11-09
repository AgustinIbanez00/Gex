<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('examenes', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('curso_id')->nullable();
			$table->foreign("curso_id")->references("id")->on("cursos");
			$table->unsignedBigInteger('materia_id')->nullable();
			$table->foreign("materia_id")->references("id")->on("materias");

			$table->string("nombre")->nullable();
			$table->dateTime("fecha_creacion")->nullable();
			$table->integer("min_tardanza")->nullable();
			$table->integer("nota_regular")->nullable();
			$table->integer("nota_promo")->nullable();
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
		Schema::dropIfExists('examenes');
	}
}
