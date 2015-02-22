<?php

class Post extends \Eloquent {

	protected $table = 'posts';

	public $timestamps = false;

	public function author()
	{
		return $this->hasOne('Account', 'Id', 'author_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment', 'post_id', 'id')->orderBy('date', 'desc');
	}
}
