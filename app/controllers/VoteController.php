<?php

class VoteController extends \BaseController {

	private $votes = 62;

	public function index()
	{
		$palierId = $this->palierId();
		$votesCount = $this->userVotes();
		$giftsCount = $this->giftsCount();
		$nextGifts = $this->nextGift();
		$progress = $this->progressBar($palierId);
		$steps = $this->stepsList($palierId);
		$current = 1;

		$data = array(
			"palierId"   => $palierId,
			"votesCount" => $votesCount,
			"giftsCount" => $giftsCount,
			"nextGifts"  => $nextGifts,
			"progress"   => $progress,
			"steps"	     => $steps,
			"reward"     => $steps[1],
			"current"    => $current,
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

		$votesCount = $this->userVotes();
		$progress = $this->progressBar($id);
		$steps = $this->stepsList($id);
		$current = 1;

		$data = array(
			"palierId" => $id,
			"progress" => $progress,
			"steps"	   => $steps,
			"reward"   => $steps[1],
			"current"  => $current,
		);

		return View::make('vote.palier', $data);
	}

	public function object($item)
	{
		$object = ItemTemplate::where('Id', $item)->firstOrFail();

		$json = array(
			"name"        => DofusAPI::text($object->NameId),
			"description" => DofusAPI::text($object->DescriptionId),
			"image"       => DofusAPI::forge("dofus/www/game/items/200/" . $object->IconId . ".png"),
		);

		return json_encode($json);
	}

	private function userVotes()
	{
		return 62;
	}

	private function palierId()
	{
		return intval($this->userVotes() / 50) + 1;
	}

	private function giftsCount()
	{
		return intval($this->userVotes() / 10);
	}

	private function nextGift()
	{
		return 10 - ($this->userVotes() % 10);
	}

	private function progressBar($palierId)
	{
		$progress = ($this->userVotes() - (($palierId - 1) * 50)) * 100 / 50;
		return $progress > 100 ? 100 : $progress;
	}

	private function stepsList($palierId)
	{
		return array(
			1 => VoteReward::where('votes', 50 * ($palierId - 1) + 10)->firstOrFail(),
			2 => VoteReward::where('votes', 50 * ($palierId - 1) + 20)->firstOrFail(),
			3 => VoteReward::where('votes', 50 * ($palierId - 1) + 30)->firstOrFail(),
			4 => VoteReward::where('votes', 50 * ($palierId - 1) + 40)->firstOrFail(),
			5 => VoteReward::where('votes', 50 * ($palierId - 1) + 50)->firstOrFail(),
		);
	}

}
