<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicaciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publicacios', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('activa')->nullable()->default(1);
			$table->date('dataPublicacio')->nullable();
			$table->boolean('esEnviamentDomicili')->nullable();
			$table->string('nom');
			$table->float('preu');
			$table->float('preuReduit');
			$table->nullabletimestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publicacios');
	}

}
