<?php

class Account extends \Eloquent {
	protected $fillable = array(
		'Login',
		'PasswordHash',
		'Nickname',
		'Role',
		'Ticket',
		'SecretQSuestion',
		'SecretAnswer',
		'Lang',
		'Email',
		'CreationDate',
		'SubscriptionEndDate',
	);
	protected $table = 'accounts';
	protected $connection = 'auth';

	public static $rules = array(
		'username'             => 'required|min:3|max:32|unique:accounts,Login',
		'password'             => 'required|min:6',
		'password_confirm' 	   => 'required|same:password',
		'email'                => 'required|email|unique:accounts,Email',
		'g-recaptcha-response' => 'required|recaptcha',
		'cg'                   => 'required'
	);
}
