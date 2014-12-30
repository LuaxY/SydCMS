<?php

class Account extends \Eloquent {
	protected $fillable = [];
	protected $table = 'accounts';
	protected $connection = 'auth';
}
