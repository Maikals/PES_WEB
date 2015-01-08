<?php

class ModalitatsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('modalitats')->truncate();

		$modalitats = array(
			array('descripcio' => 'Mensual'),
			array('descripcio' => 'Bimensual'),
			array('descripcio' => 'Trimestral'),
			array('descripcio' => 'Semestral'),
			array('descripcio' => 'Anual')
		);

		// Uncomment the below to run the seeder
		DB::table('modalitats')->insert($modalitats);
	}

}
