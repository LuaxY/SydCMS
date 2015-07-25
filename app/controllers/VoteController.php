<?php

class VoteController extends \BaseController {

	private $votes = 62;

	public function index()
	{
		if (Auth::guest())
			return View::make('vote.index');

		$palierId = $this->palierId();
		$votesCount = $this->userVotes();
		$giftsCount = $this->giftsCount();
		$nextGifts = $this->nextGift();
		$progress = $this->progressBar($palierId);
		$steps = $this->stepsList($palierId);
		$current = (($votesCount + $nextGifts) / 10) % 5;
		$delay = $this->delay();

		$data = array(
			"palierId"   => $palierId,
			"votesCount" => $votesCount,
			"giftsCount" => $giftsCount,
			"nextGifts"  => $nextGifts,
			"progress"   => $progress,
			"steps"	     => $steps,
			"current"    => $current,
			"delay"      => $delay,
		);

		return View::make('vote.index', $data);
	}

	public function process()
	{
		$delay = $this->delay();

		if (!$delay->canVote)
			return $this->index();

		Auth::user()->VoteCount += 1;
		Auth::user()->Tokens += 10;

		Auth::user()->update(array(
			'VoteCount' => Auth::user()->VoteCount,
			'Tokens' => Auth::user()->Tokens,
			'LastVote'  => date("Y-m-d H:i:s"),
		));

		if (Auth::user()->VoteCount % 10 == 0)
		{
			$reward = VoteReward::where('votes', Auth::user()->VoteCount)->firstOrFail();

			// TODO: add $reward->itemId to account
		}

		return Redirect::to("http://www.rpg-paradize.com/?page=vote&vote=" . Config::get("dofus.rpg-paradize.id"));
	}

	public function palier($id)
	{
		if ($id < 1 || $id > 5)
			$id = 1;

		$votesCount = $this->userVotes();
		$progress = $this->progressBar($id);
		$steps = $this->stepsList($id);
		$current = 5;

		$data = array(
			"palierId" => $id,
			"progress" => $progress,
			"steps"	   => $steps,
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
		return Auth::user()->VoteCount;
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

	private function delay()
	{
		$obj = new stdClass();

		$obj->now = strtotime(date("Y-m-d H:i:s"));
		$obj->duration = $obj->now - strtotime(Auth::user()->LastVote);
		$obj->canVote = $obj->duration < Config::get("dofus.vote_delay") ? false : true;
		$obj->wait = Config::get("dofus.vote_delay") - $obj->duration;
		$obj->hours = intval($obj->wait / 3600);
		$obj->minutes = intval(($obj->wait % 3600) / 60);
		$obj->seconds = intval((($obj->wait % 3600) % 60));

		return $obj;
	}

}
