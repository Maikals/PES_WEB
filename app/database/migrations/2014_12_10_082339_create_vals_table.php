<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vals', function(Blueprint $table) {
			$table->increments('id');
			$table->date('data');
			$table->boolean('cancelat');
			$table->integer('idSubscriptor')->unsigned()->nullable();
			$table->foreign('idSubscriptor')->references('id')->on('subscriptors')->onDelete('cascade');
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
		Schema::drop('vals');
	}

}
