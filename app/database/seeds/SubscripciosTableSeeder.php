<?php

class SubscripciosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subscripcios')->truncate();

		$subscripcios = array(
			array(
				'cancelada' => false,
				'dataCancelacio' => null,
				'dataFiCreacio' => null,
				'idModalitat' => 3,
				'nom' => '',
				'preu' => '',
				'idPublicacio' => 1,
				'idSubscriptor' => 1
			),
			array(
				'cancelada' => false,
				'dataCancelacio' => null,
				'dataFiCreacio' => null,
				'idModalitat' => 3,
				'nom' => '',
				'preu' => '',
				'idPublicacio' => 2,
				'idSubscriptor' => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('subscripcios')->insert($subscripcios);
	}

}
