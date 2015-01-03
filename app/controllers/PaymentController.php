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

	public function code()
	{
		$country = Input::old('country');
		$method  = Input::old('method');
		$code    = Input::old('code');
		$cgv     = Input::old('cgv');

		$data = array();
		$data['country'] = (!empty($country) ? $country : Input::get('country'));
		$data['method']  = (!empty($method)  ? $method :  Input::get('method'));
		$data['code']    = (!empty($code)    ? $code :    Input::get('code'));
		$data['cgv']     = (!empty($cgv)     ? $cgv :     Input::get('cgv'));

		$validator = Validator::make($data,
			array(
				'country' => 'required|size:2|alpha_num',
				'method'  => 'required|in:sms,audiotel,mobilecall',
				'cgv'     => 'required',
			)
		);

		if ($validator->fails())
		{
			return Redirect::route('shop.payment.method', $data['country'])->withErrors($validator);
		}

		$starpass = $this->starpass->fr->audiotel;
		$country = 'fr';

		if (isset($this->starpass->$data['country']->$data['method']))
		{
			$starpass = $this->starpass->$data['country']->$data['method'];
			$country = $data['country'];
		}

		return View::make('shop.payment.code', array('starpass' => $starpass, 'country' => $country, 'method' => $data['method'], 'cgv' => 1));
	}

	public function process()
	{
		$data = Input::all();

		$validator = Validator::make($data,
			array(
				'country' => 'required|size:2|alpha_num',
				'method'  => 'required|in:sms,audiotel,mobilecall',
				'code'    => 'required|size:8|alpha_num',
				'cgv'     => 'required',
			)
		);

		if ($validator->fails())
		{
			return Redirect::route('shop.payment.code')->withErrors($validator)->withInput();
		}

		$ident = urlencode(Config::get('dofus.starpass.idp') . ";;" . Config::get('dofus.starpass.idd'));
		$validation = @file_get_contents("http://script.starpass.fr/check_php.php?ident=$ident&codes={$data['code']}&DATAS=");

		/**
		* States :
		* 0: Success
		* 1: Fail
		* 2: Error
		**/

		if ($validation)
		{
			$validation = explode('|', $validation);

			if ($validation[0] == "OUI")
			{
				// Success

				$points = Config::get('dofus.points');

				if (array_key_exists($data['country'] . '|' . $data['method'], Config::get('dofus.promos')))
				{
					$points += Config::get('dofus.promos')[$data['country'] . '|' . $data['method']];
				}

				$transaction = array(
					'account'     => Auth::user()->Id,
					'state'       => 0,
					'code'        => $data['code'],
					'points'      => $points,
					'country'     => $validation[2],
					'palier_name' => $validation[3],
					'palier_id'   => $validation[4],
					'type'        => $validation[5],
				);

				Transaction::create($transaction);

				Auth::user()->NewTokens += $points;
				Auth::user()->update(array('NewTokens' => Auth::user()->NewTokens));

				return Redirect::route('home'); // TODO: Tell him he's a winner :)
			}
			else
			{
				// Fail

				$transaction = array(
					'account'     => Auth::user()->Id,
					'state'       => 1,
					'code'        => $data['code'],
					'points'      => 0,
					'country'     => $data['country'],
					'type'        => $data['method'],
				);

				Transaction::create($transaction);

				return Redirect::route('shop.payment.code')->withErrors(array('code' => 'Code incorrecte.'))->withInput();
			}
		}
		else
		{
			// Something wrong

			$transaction = array(
				'account'     => Auth::user()->Id,
				'state'       => 2,
				'code'        => $data['code'],
				'points'      => 0,
				'country'     => $data['country'],
				'type'        => $data['method'],
			);

			Transaction::create($transaction);

			return Redirect::route('shop.payment.code')->withErrors(array('code' => 'La vérification du code à échoué.'))->withInput();
		}
	}

}
