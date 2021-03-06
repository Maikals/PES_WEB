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

Route::get('/', array('before' => 'auth', function()
{
	return View::make('hello');
}));

/* ROUTES PROTECTED BY AUTH/LOGIN */
Route::group(array('before' => 'auth'), function() {
	Route::resource('administradors', 'AdministradorsController');
	Route::resource('compras', 'ComprasController');
	Route::resource('editorials', 'EditorialsController');
	Route::resource('publicacios', 'PublicaciosController');
	Route::resource('quioscs', 'QuioscsController');
	Route::resource('quiosquers', 'QuiosquersController');
	Route::resource('subscripcios', 'SubscripciosController');

    Route::get('subscripcios/enable/{id}', array('as' => 'subscripcios.enable', 'uses' => 'SubscripciosController@enable'));
    Route::get('subscripcios/disable/{id}', array('as' => 'subscripcios.disable', 'uses' => 'SubscripciosController@disable'));

	Route::resource('vals', 'ValsController');
	Route::resource('subscriptors', 'SubscriptorsController');
    Route::group(array('before' => 'admin'), function() {
        Route::get('subscriptors', 'SubscriptorsController@index');
    });
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
    Route::get('vals/check', 'Api\ValsController@check');
    Route::get('vals/tick', 'Api\ValsController@tick');
    Route::get('vals/verifyifused', 'Api\ValsController@verifyIfUsed');
});