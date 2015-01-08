<?php

class Publicacio extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'preu' => 'required',
		'preuReduit' => 'required'
	);
}
