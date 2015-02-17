<?php

class PaymentController extends \BaseController {

	private $payment;

	public function __construct()
	{
		// TODO: cache

		if ($this->isStarpass())
		{
			$json = json_decode(file_get_contents(Config::get('dofus.payment.starpass.url')));
			$this->payment = new stdClass;

			foreach ($json as $countryName => $country)
			{
				$this->payment->$countryName = new stdClass;
				$palier = "one";

				foreach ($country as $methodName => $method)
				{
					$this->payment->$countryName->$methodName = new stdClass;

					$newMethod = new stdClass;
					$newMethod->devise = $method->sCurrencyToDisplay;
					$newMethod->points = 100;

					if ($methodName == "sms")
					{
						$newMethod->number  = $method->smsPhoneNumber;
						$newMethod->keyword = $method->smsKeyword;
						$newMethod->cost    = $method->smsCostDetail;
						$newMethod->text    = "{$method->smsCostDetail}/SMS + prix d'un SMS<br>1 envoi de SMS par code d'accès";
					}

					if ($methodName == "audiotel" || $methodName == "mobilecall")
					{
						$newMethod->number = $method->audiotelPhone;
						$newMethod->cost   = $method->audiotelFixedCostDetail;
						$newMethod->text   = "{$method->audiotelFixedCostDetail}/appel {$method->audiotelVariableCostDetail}/min depuis une ligne fixe<br>Obtention du code en < 1,30 min. Coût : ".$method->fCostPerAction + (substr($method->audiotelVariableCostDetail, 2, 5) * 1.5)." {$method->sCurrencyToDisplay}";
					}

					$this->payment->$countryName->$methodName->$palier = $newMethod;
				}
			}
		}
		elseif ($this->isOneoPay())
		{
			$json = json_decode(file_get_contents(Config::get('dofus.payment.oneopay.url')));
			$this->payment = new stdClass;

			foreach ($json as $method)
			{
				$countryName = strtolower($method->country->iso);
				$methodName  = strtolower($method->solution);
				$palier      = $method->rate;

				if (!property_exists($this->payment, $countryName))
				{
					$this->payment->$countryName = new stdClass;
				}

				if (!property_exists($this->payment->$countryName, $methodName))
				{
					$this->payment->$countryName->$methodName = new stdClass;
				}

				$newMethod = new stdClass;

				$newMethod->devise = $method->user_currency == "EUR" ? "&euro;" : $method->user_currency;
				$newMethod->text   = $method->mention;
				$newMethod->cost   = $method->user_price . " " . $newMethod->devise;
				$newMethod->points = $method->user_earns;

				if ($methodName == "sms")
				{
					$newMethod->number  = $method->shortcode;
					$newMethod->keyword = $method->keyword;
				}

				if ($methodName == "audiotel" )
				{
					$newMethod->number = $method->phone;
				}

				$this->payment->$countryName->$methodName->$palier = $newMethod;
			}
		}
		else
		{
			$this->payment = new stdClass;
		}
	}

	public function country()
	{
		return View::make('shop.payment.country', array('payment' => $this->payment));
	}

	public function method($country = 'fr')
	{
		if (isset($this->payment->$country))
		{
			$data = $this->payment->$country;
		}
		else
		{
			$data = $this->payment->fr;
			$country = 'fr';
		}

		return View::make('shop.payment.method', array('payment' => $data, 'country' => $country));
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

		$split = explode('_', $data['method']);
		$data['method_'] = $split[0];
		$data['palier']  = $split[1];

		$validator = Validator::make($data,
			array(
				'country' => 'required|size:2|alpha_num',
				'method_' => 'required|in:sms,audiotel,mobilecall',
				'cgv'     => 'required',
			)
		);

		if ($validator->fails())
		{
			return Redirect::route('shop.payment.method', $data['country'])->withErrors($validator);
		}

		if (!isset($this->payment->$data['country']->$data['method_']->$data['palier']))
		{
			return Redirect::route('shop.payment.method', $data['country'])->withErrors(array('palier' => 'Le palier selectionné est invalide.'));
		}
		else
		{
			$payment = $this->payment->$data['country']->$data['method_']->$data['palier'];
			$country = $data['country'];

			return View::make('shop.payment.code', array('payment' => $payment, 'country' => $country, 'method' => $data['method_'], 'palier' => $data['palier'], 'cgv' => 1));
		}
	}

	public function process()
	{
		$data = Input::all();

		$split = explode('_', $data['method']);
		$data['method_'] = $split[0];
		$data['palier']  = $split[1];

		$validator = Validator::make($data,
			array(
				'country' => 'required|size:2|alpha_num',
				'method_' => 'required|in:sms,audiotel,mobilecall',
				'code'    => 'required|min:6|max:8|alpha_num',
				'cgv'     => 'required',
			)
		);

		if ($validator->fails())
		{
			return Redirect::route('shop.payment.code')->withErrors($validator)->withInput($data);
		}

		if (!isset($this->payment->$data['country']->$data['method_']->$data['palier']))
		{
			return Redirect::route('shop.payment.code')->withErrors(array('palier' => 'Le palier selectionné est invalide.'))->withInput($data);
		}

		$validation = $this->checkCode($data['code'], $data['palier']);

		var_dump($validation); // TODO

		/**
		* States :
		* 0: Success
		* 1: Fail
		* 2: Error
		**/

		/*if ($validation)
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
		}*/
	}

	private function checkCode($code, $palier)
	{
		$id = "";
		$validation = "";

		if ($this->isStarpass())
		{
			$id = urlencode(Config::get('dofus.payment.starpass.idp') . ";;" . Config::get('dofus.payment.starpass.idd'));
			$validation = Config::get('dofus.payment.starpass.validation');
		}
		elseif ($this->isOneopay())
		{
			$id = Config::get('dofus.payment.oneopay.id');
			$validation = Config::get('dofus.payment.oneopay.validation');
		}
		else
		{
			return false;
		}

		$validation = str_replace('{ID}', $id, $validation);
		$validation = str_replace('{CODE}', $code, $validation);
		$validation = str_replace('{PALIER}', $palier, $validation);

		$result = @file_get_contents($validation);

		// TODO: format result

		return $result;
	}

	private function isStarpass()
	{
		if (Config::get('dofus.payment.used') == "starpass")
			return true;
		else
			return false;
	}

	private function isOneoPay()
	{
		if (Config::get('dofus.payment.used') == "oneopay")
			return true;
		else
			return false;
	}

	private function used()
	{
		return Config::get('dofus.payment.used');
	}

}
