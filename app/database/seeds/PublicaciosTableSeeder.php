<?php

class PublicaciosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('publicacios')->truncate();

		$publicacios = array(
			array(
					'activa' => true,
					'dataPublicacio' => '12/22/2014',
					'esEnviamentDomicili' => true,
					'nom' => 'La Retaguardia',
					'preu' => 2.00,
					'preuReduit' => 1.20
				),
			array(
					'activa' => true,
					'dataPublicacio' => '12/22/2014',
					'esEnviamentDomicili' => true,
					'nom' => 'El Intermitente del Procrastinador',
					'preu' => 2.10,
					'preuReduit' => 1.60
				)
		);

		// Uncomment the below to run the seeder
		DB::table('publicacios')->insert($publicacios);
	}

}
