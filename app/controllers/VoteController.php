<?php

class VoteController extends \BaseController {

	private $votes = 62;

	public function index()
	{
		$palierId = 1;
		$votesCount = $this->votes;
		$giftsCount = intval($votesCount / 10);
		$nextGifts = 10 - ($votesCount - ($giftsCount * 10));
		$progress = ($votesCount - (($palierId - 1) * 50)) * 100 / 50;
		$progress = $progress > 100 ? 100 : $progress;

		$data = array(
			"palierId"   => $palierId,
			"votesCount" => $votesCount,
			"giftsCount" => $giftsCount,
			"nextGifts"  => $nextGifts,
			"progress"   => $progress,
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
		$votesCount = $this->votes;
		$progress = ($votesCount - (($id - 1) * 50)) * 100 / 50;
		$progress = $progress > 100 ? 100 : $progress;

		$data = array(
			"palierId" => $id,
			"progress" => $progress,
		);

		return View::make('vote.palier', $data);
	}

}
