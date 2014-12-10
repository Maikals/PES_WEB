<?php

class Quiosc extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'adrecaEstabliment' => 'required',
		'compteCorrent' => 'required',
		'nom' => 'required',
		'php artisan generate' => 'required',
		'validat' => 'required'
	);
}
