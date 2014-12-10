<?php

class SubscriptorsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subscriptors')->truncate();

		$subscriptors = array(
			array(
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
                'adrecaEnviament' => 'Mi Casa, 101',
                'nom' => 'Evaristo Trindamere'
            )
		);

		// Uncomment the below to run the seeder
		DB::table('subscriptors')->insert($subscriptors);
	}

}
