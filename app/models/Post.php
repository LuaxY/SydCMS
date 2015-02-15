<?php

class Post extends \Eloquent {

	protected $table = 'posts';

	public $timestamps = false;

	public function comments()
	{
		return $this->hasMany('Comment', 'post_id', 'id');
	}
}
