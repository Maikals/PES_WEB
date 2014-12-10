<?php

class Compra extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'data' => 'required',
		'modeEnviamentRecollida' => 'required'
	);
}
