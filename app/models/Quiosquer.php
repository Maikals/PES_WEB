<?php

class Quiosquer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'col' => 'required'
	);
}
