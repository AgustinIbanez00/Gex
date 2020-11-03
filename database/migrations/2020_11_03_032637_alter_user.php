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
            $table->string("lastName");
            $table->bigInteger("dni")->uniqid();
            $table->date("birth_date");
            $table->string("observation");
            $table->integer("type");
            $table->integer("state");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("lastName");
            $table->dropColumn("dni");
            $table->dropColumn("birt_date");
            $table->dropColumn("observation");
            $table->dropColumn("type");
            $table->dropColumn("state");
        });
    }
}
