<?php

class Modalitat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'descripcio' => 'required'
	);
}
