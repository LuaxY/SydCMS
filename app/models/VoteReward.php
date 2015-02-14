<?php

class VoteReward extends \Eloquent {

	protected $table = 'vote_rewards';

	public $timestamps = false;

	public function item()
	{
		return $this->hasOne('ItemTemplate', 'Id', 'object');
	}
}
