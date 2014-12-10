<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('adrecaDomicili')->nullable();
			$table->string('adrecaEnviament');
			$table->string('cognom1')->nullable();
			$table->string('cognom2')->nullable();
			$table->string('compteCorrent')->nullable();
			$table->string('password');
			$table->date('dataNaixement')->nullable();
			$table->string('dni')->nullable();
			$table->string('email')->unique();
			$table->boolean('estaBloquejat')->nullable();
			$table->string('nom');
			$table->string('telefonContacte')->nullable();
			$table->nullabletimestamps();
			$table->rememberToken();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscriptors');
	}

}
