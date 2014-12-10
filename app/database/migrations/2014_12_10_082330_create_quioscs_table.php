<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuioscsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quioscs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('adrecaEstabliment');
			$table->integer('compteCorrent');
			$table->string('nom');
			$table->integer('numQuiosc');
			$table->boolean('validat');
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
		Schema::drop('quioscs');
	}

}
