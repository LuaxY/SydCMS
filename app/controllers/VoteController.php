<?php

class VoteController extends \BaseController {

	private $votes = 62;

	public function index()
	{
		$palierId = intval($this->votes / 50) + 1;
		$votesCount = $this->votes;
		$giftsCount = intval($votesCount / 10);
		$nextGifts = 10 - ($votesCount % 10);
		$progress = ($votesCount - (($palierId - 1) * 50)) * 100 / 50;
		$progress = $progress > 100 ? 100 : $progress;
		$reward = VoteReward::where('step', 10)->firstOrFail();

		$data = array(
			"palierId"   => $palierId,
			"votesCount" => $votesCount,
			"giftsCount" => $giftsCount,
			"nextGifts"  => $nextGifts,
			"progress"   => $progress,
			"reward"     => $reward,
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
		if ($id < 1 || $id > 5)
			$id = 1;

		$votesCount = $this->votes;
		$progress = ($votesCount - (($id - 1) * 50)) * 100 / 50;
		$progress = $progress > 100 ? 100 : $progress;
		$reward = VoteReward::where('step', 10)->firstOrFail();

		$data = array(
			"palierId" => $id,
			"progress" => $progress,
			"reward"   => $reward,
		);

		return View::make('vote.palier', $data);
	}

	public function object($palier, $step)
	{
		if ($palier < 1 || $palier > 5)
			$palier = 1;

		if ($step < 1 || $step > 5)
			$step = 1;

		$reward = VoteReward::where('step', 10)->firstOrFail();

		return View::make('vote.object', compact('reward'));
	}

}
