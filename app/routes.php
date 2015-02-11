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
		'uses' => 'NewsController@index',
		'as' => 'home'
	));

	/* NEWS */

	Route::get(Lang::get('routes.news.index'), array(
		'uses' => 'NewsController@index',
		'as'   => 'news'
	));
	Route::get(Lang::get('routes.news.post'), array(
		'uses' => 'NewsController@show',
		'as'   => 'news.post'
	));

	/* ACCOUNTS */

	Route::resource('accounts', 'AccountsController');

	Route::get(Lang::get('routes.account.register'), array(
		'uses' => 'AccountsController@create',
		'as'   => 'register'
	));
	Route::get(Lang::get('routes.account.login'), array(
		'uses' => 'AccountsController@auth',
		'as'   => 'login'
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
	Route::any(Lang::get('routes.shop.payment.get-code'), array(
		'before' => 'auth',
		'uses'   => 'PaymentController@code',
		'as'     => 'shop.payment.code'
	));
	Route::post(Lang::get('routes.shop.payment.process'), array(
		'before' => 'auth',
		'uses'   => 'PaymentController@process',
		'as'     => 'shop.payment.process'
	));

	/* VOTE */

	Route::get(Lang::get('routes.vote.index'), array(
		'uses'   => 'VoteController@index',
		'as'     => 'vote.index'
	));
	Route::get(Lang::get('routes.vote.process'), array(
		'before' => 'auth',
		'uses'   => 'VoteController@process',
		'as'     => 'vote.process'
	));

});
