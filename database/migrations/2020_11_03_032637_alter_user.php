<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUser extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->bigInteger("dni")->uniqid()->nullable();;
			$table->string("last_name")->nullable();
			$table->date("birth_date")->nullable();
			$table->string("observation")->nullable();
			$table->integer("type")->nullable();
			$table->integer("state")->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
