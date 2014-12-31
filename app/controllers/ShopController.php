<?php

class ShopController extends \BaseController {

	public function index()
	{
		return View::make('shop.payment_method');
	}

}
