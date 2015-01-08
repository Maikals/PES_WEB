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
			$table->boolean('cancelada')->default(0);
			$table->date('dataCancelacio')->nullable();
			$table->date('dataFiCreacio')->nullable();
			$table->string('nom')->nullable();
			$table->float('preu')->nullable();
			$table->nullabletimestamps();

			$table->integer('idModalitat')->unsigned()->nullable();
			$table->foreign('idModalitat')->references('id')->on('modalitats')->onDelete('cascade');

			$table->integer('idPublicacio')->unsigned()->nullable();
			$table->foreign('idPublicacio')->references('id')->on('publicacios')->onDelete('cascade');

			$table->integer('idSubscriptor')->unsigned()->nullable();
			$table->foreign('idSubscriptor')->references('id')->on('subscriptors')->onDelete('cascade');

            $table->unique(array('idSubscriptor', 'idPublicacio'));
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
