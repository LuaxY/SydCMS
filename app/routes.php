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
Route::get('register', 'AccountsController@create');
Route::post('auth/login', 'AccountsController@login');
Route::get('auth/logout', 'AccountsController@logout');

/* SHOP */

Route::get('shop', 'ShopController@index');
