<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('AdministradorsTableSeeder');
		$this->call('ComprasTableSeeder');
		$this->call('EditorialsTableSeeder');
		$this->call('ModalitatsTableSeeder');
		$this->call('PublicaciosTableSeeder');
		$this->call('QuioscsTableSeeder');
		$this->call('QuiosquersTableSeeder');
		$this->call('SubscripciosTableSeeder');
		$this->call('SubscriptorsTableSeeder');
		$this->call('ValsTableSeeder');
	}

}
