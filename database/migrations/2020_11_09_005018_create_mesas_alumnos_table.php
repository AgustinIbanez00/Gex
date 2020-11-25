<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas_alumnos', function (Blueprint $table) {
					$table->id();
					$table->unsignedBigInteger('alumno_id')->nullable();
					$table->foreign("alumno_id")->references("id")->on("users");
					$table->unsignedBigInteger('mesa_id')->nullable();
					$table->foreign("mesa_id")->references("id")->on("mesas");	
					$table->string("nota")->nullable();			
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
        Schema::dropIfExists('mesas_alumnos');
    }
}
