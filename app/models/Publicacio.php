<?php

class Publicacio extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'activa' => 'required',
		'dataPublicacio' => 'required',
		'esEnviamentDomicili' => 'required',
		'nom' => 'required',
		'preu' => 'required',
		'preuReduit' => 'required'
	);
}
