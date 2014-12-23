<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/* ROUTES PROTECTED BY AUTH/LOGIN */
Route::group(array('before' => 'auth'), function() {

	Route::resource('administradors', 'AdministradorsController');
	Route::resource('compras', 'ComprasController');
	Route::resource('editorials', 'EditorialsController');
	Route::resource('publicacios', 'PublicaciosController');
	Route::resource('quioscs', 'QuioscsController');
	Route::resource('quiosquers', 'QuiosquersController');
	Route::resource('subscripcios', 'SubscripciosController');
	Route::resource('vals', 'ValsController');
	Route::resource('subscriptors', 'SubscriptorsController');

});

/* AUTH */
Route::get('login', function()
{
	return View::make('login/login');
})->before('guest');
Route::post('login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@doLogout');

/* API */

Route::api('v1', function () {
    Route::get('checkapi', function() { return 'ok'; });
    Route::post('checkauth', 'Api\AuthController@checkAuth');
    Route::get('vals', 'Api\ValsController@index');
});