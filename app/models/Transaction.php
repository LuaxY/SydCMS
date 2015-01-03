<?php

class Transaction extends \Eloquent {

	protected $fillable = array(
		'account',
		'state',
		'code',
		'points',
		'country',
		'palier_name',
		'palier_id',
		'type',
	);

	protected $table = 'transactions';

	public $timestamps = false;
}
