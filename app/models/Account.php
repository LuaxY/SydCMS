<?php

use Illuminate\Auth\UserInterface;

class Account extends \Eloquent implements UserInterface {

	protected $primaryKey = 'Id';

	protected $fillable = array(
		'Login',
		'PasswordHash',
		'Nickname',
		'Role',
		'Ticket',
		'SecretQuestion',
		'SecretAnswer',
		'Lang',
		'Email',
		'CreationDate',
		'SubscriptionEnd',
		'LastVote',
		'VoteCount',
	);

	protected $table = 'accounts';

	protected $connection = 'auth';

	public $timestamps = false;

	protected $hidden = array('PasswordHash');

	public static $rules = array(
		'username'             => 'required|min:3|max:32|unique:accounts,Login|alpha_num',
		'password'             => 'required|min:6',
		'password_confirm' 	   => 'required|same:password',
		'email'                => 'required|email|unique:accounts,Email',
		'g-recaptcha-response' => 'required|recaptcha',
		'cg'                   => 'required'
	);

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->PasswordHash;
	}

	public function getRememberToken()
	{
		return null; // not supported
	}

	public function setRememberToken($value)
	{
		// not supported
	}

	public function getRememberTokenName()
	{
		return null; // not supported
	}
}
