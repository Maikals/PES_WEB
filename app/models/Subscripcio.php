<?php

class Subscripcio extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'cancelada' => 'required',
		'dataCancelacio' => 'required',
		'dataFiCreacio' => 'required',
		'php artisan generate' => 'required',
		'nom' => 'required',
		'preu' => 'required'
	);
}
