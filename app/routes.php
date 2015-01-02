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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::any('/', 'AccountsController@index');

/* ACCOUNTS */

Route::resource('accounts', 'AccountsController');
Route::get('register', array(
	'uses' => 'AccountsController@create',
	'as'   => 'register'
));
Route::post('auth/login', array(
	'uses' => 'AccountsController@login',
	'as'   => 'login'
));
Route::get('auth/logout', array(
	'uses' => 'AccountsController@logout',
	'as'   => 'logout'
));

/* SHOP */

Route::get('shop/payment/choose-country', array(
	'before' => 'auth',
	'uses'   => 'PaymentController@country',
	'as'     => 'shop.payment.country'
));
Route::get('shop/payment/{country?}/choose-method', array(
	'before' => 'auth',
	'uses'   => 'PaymentController@method',
	'as'     => 'shop.payment.method'
));
Route::post('shop/payment/process', array(
	'before' => 'auth',
	'uses'   => 'PaymentController@process',
	'as'     => 'shop.payment.process'
));
