<?php

class VoteController extends \BaseController {

	public function index()
	{
		return View::make('vote.vote');
	}

	public function process()
	{
		// TODO: check last vote
		//       add gift

		return Redirect::to("http://www.rpg-paradize.com/?page=vote&vote=" . Config::get("dofus.rpg-paradize.id"));
	}

}
