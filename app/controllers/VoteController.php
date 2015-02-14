<?php

class VoteController extends \BaseController {

	public function index()
	{
		$data = array(
			"palierId" => 1
		);

		return View::make('vote.index', $data);
	}

	public function process()
	{
		// TODO: check last vote
		//       add gift

		return Redirect::to("http://www.rpg-paradize.com/?page=vote&vote=" . Config::get("dofus.rpg-paradize.id"));
	}

	public function palier($id)
	{
		$data = array(
			"palierId" => $id
		);

		return View::make('vote.palier', $data);
	}

}
