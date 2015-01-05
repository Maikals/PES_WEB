<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Val extends Eloquent {

	use SoftDeletingTrait;

	protected $guarded = array();

	public static $rules = array(
		'data' => 'required',
		'idSubscripcio' => 'required'
	);
}
