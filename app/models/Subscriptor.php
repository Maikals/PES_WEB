<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Subscriptor extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');

	protected $guarded = array();

	public static $rules = array(
		'adrecaEnviament' => 'required',
		'nom' => 'required'
	);

	public function subscripcions() {
		return $this->hasMany('Subscripcio', 'idSubscriptor')->where('cancelada', '=', false);
	}

}
