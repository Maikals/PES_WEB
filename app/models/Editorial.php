<?php

class Editorial extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'col' => 'required'
	);
}
