<?php

class VoteController extends \BaseController {

	public function index()
	{
		return View::make('vote.index');
	}

	public function process()
	{
		// TODO: check last vote
		//       add gift

		return Redirect::to("http://www.rpg-paradize.com/?page=vote&vote=" . Config::get("dofus.rpg-paradize.id"));
	}

	public function palier($id)
	{
		return View::make('vote.palier');
	}

}
