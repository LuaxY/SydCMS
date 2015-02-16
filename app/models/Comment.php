<?php

class Comment extends \Eloquent {

	protected $fillable = [];

	protected $table = 'comments';

	public $timestamps = false;

	public function author()
	{
		return $this->hasOne('Account', 'Id', 'author_id');
	}
}
