<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscripciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscripcios', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('cancelada');
			$table->date('dataCancelacio');
			$table->date('dataFiCreacio');
			$table->string('modalitat');
			$table->string('nom');
			$table->float('preu');
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
		Schema::drop('subscripcios');
	}

}
