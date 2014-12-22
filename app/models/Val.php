<?php

class Val extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'data' => 'required',
		'idSubscripcio' => 'required'
	);
}
