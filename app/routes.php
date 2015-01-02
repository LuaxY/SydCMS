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

$locale = Request::segment(1);

if (in_array($locale, Config::get('app.available_locales')))
{
	App::setLocale($locale);
}
else
{
	$locale = null;
}

Route::group(array('prefix' => $locale), function()
{

	Route::any('/', array(
		'uses' => 'AccountsController@index',
		'as' => 'home'
	));

	/* ACCOUNTS */

	Route::resource('accounts', 'AccountsController');

	Route::get(Lang::get('routes.account.register'), array(
		'uses' => 'AccountsController@create',
		'as'   => 'register'
	));
	Route::post(Lang::get('routes.account.login'), array(
		'uses' => 'AccountsController@login',
		'as'   => 'login'
	));
	Route::get(Lang::get('routes.account.logout'), array(
		'uses' => 'AccountsController@logout',
		'as'   => 'logout'
	));

	/* SHOP */

	Route::get(Lang::get('routes.shop.payment.choose-country'), array(
		'before' => 'auth',
		'uses'   => 'PaymentController@country',
		'as'     => 'shop.payment.country'
	));
	Route::get(Lang::get('routes.shop.payment.choose-method'), array(
		'before' => 'auth',
		'uses'   => 'PaymentController@method',
		'as'     => 'shop.payment.method'
	));
	Route::post(Lang::get('routes.shop.payment.process'), array(
		'before' => 'auth',
		'uses'   => 'PaymentController@process',
		'as'     => 'shop.payment.process'
	));

});
