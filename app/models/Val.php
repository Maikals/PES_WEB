<?php

class Val extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'dataInici' => 'required',
		'dataFi' => 'required'
	);
}
