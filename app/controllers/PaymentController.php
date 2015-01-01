<?php

class PaymentController extends \BaseController {

	private $starpass;

	public function __construct()
	{
		$this->starpass = json_decode(file_get_contents("starpass.json"));
	}

	public function country()
	{
		return View::make('shop.payment.country', array('starpass' => $this->starpass));
	}

	public function method($country = 'fr')
	{
		if (isset($this->starpass->$country))
		{
			$data = $this->starpass->$country;
		}
		else
		{
			$data = $this->starpass->fr;
			$country = 'fr';
		}

		return View::make('shop.payment.method', array('starpass' => $data, 'country' => $country));
	}

	public function process()
	{
		$data = Input::all();

		$validator = Validator::make($data,
			array(
				'country' => 'required|size:2',
				'method'  => 'required|in:sms,audiotel',
				'cgv'     => 'required',
			)
		);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

		$starpass = $this->starpass->fr->$data['method'];
		$country = 'fr';

		if (isset($this->starpass->$data['country']->$data['method']))
		{
			$starpass = $this->starpass->$data['country']->$data['method'];
			$country = $data['country'];
		}

		return View::make('shop.payment.process', array('starpass' => $starpass, 'country' => $country, 'method' => $data['method']));
	}

}
