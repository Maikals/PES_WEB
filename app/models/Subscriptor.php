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
		'adrecaDomicili' => 'required',
		'adrecaEnviament' => 'required',
		'cognom1' => 'required',
		'php artisan generate' => 'required',
		'compteCorrent' => 'required',
		'contrasenya' => 'required',
		'dataNaixement' => 'required',
		'dni' => 'required',
		'estaBloquejat' => 'required',
		'nom' => 'required',
		'telefonContacte' => 'required'
	);

	public function subscripcions() {
		return $this->hasMany('Subscripcio', 'idSubscriptor')->where('cancelada', '=', false);
	}

}
