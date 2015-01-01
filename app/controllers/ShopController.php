<?php

class ShopController extends \BaseController {

	private $starpass;

	public function __construct()
	{
		$this->starpass = json_decode(file_get_contents("starpass.json"));
	}

	public function index()
	{
		return View::make('shop.payment_country', array('starpass' => $this->starpass));
	}

	public function country($country = 'fr')
	{
		return View::make('shop.payment_method', array('starpass' => $this->starpass->$country, 'country' => $country));
	}

}
