<?php

class AccountsController extends \BaseController {

	/**
	 * Display a listing of accounts
	 *
	 * @return Response
	 */
	public function index()
	{
		$accounts = Account::all();

		return View::make('accounts.index', compact('accounts'));
	}

	/**
	 * Show the form for creating a new account
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('accounts.create');
	}

	/**
	 * Store a newly created account in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$verifier = App::make('validation.presence');
		$verifier->setConnection('auth');
		$validator = Validator::make($data = Input::all(), Account::$rules);
		$validator->setPresenceVerifier($verifier);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$new_account = array(
			'Login'               => $data['username'],
			'PasswordHash'        => md5($data['password']),
			'Nickname'            => $data['username'],
			'Role'                => 1,
			'Ticket'              => $this->GenTicket(),
			'SecretQuestion'     => '2 + 2',
			'SecretAnswer'        => '4',
			'Lang'                => 'fr',
			'Email'               => $data['email'],
			'CreationDate'        => date('Y-m-d H:i:s'),
			'SubscriptionEnd' => '0001-01-01 00:00:00',
		);

		Account::create($new_account);

		return Redirect::route('accounts.index');
	}

	/**
	 * Display the specified account.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$account = Account::findOrFail($id);

		return View::make('accounts.show', compact('account'));
	}

	/**
	 * Show the form for editing the specified account.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/*$account = Account::find($id);

		return View::make('accounts.edit', compact('account'));*/
	}

	/**
	 * Update the specified account in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		/*$account = Account::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Account::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$account->update($data);

		return Redirect::route('accounts.index');*/
	}

	public function login()
	{
		$data = Input::all();
		var_dump($data);

		$user = Account::where('Login', $data['username'])->first();

		if ($user && $user->PasswordHash == md5($data['password']))
		{
			Auth::login($user);
			//return Redirect::intended('dashboard');
			return Redirect::to('/');
		}
		else
		{
			return Redirect::back()->withErrors(array('auth' => 'Nom de compte ou mot de passe incorrect.'))->withInput();
		}
	}

	public function logout()
	{
		if (Auth::check())
		{
			Auth::logout();
		}

		return Redirect::to('/');
	}

	private function GenTicket()
	{
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$len = strlen($chars);
		$ticket = '';

		for ($i = 0; $i < 32; $i++)
		{
			$ticket .= $chars[rand(0, $len - 1)];
		}

		return $ticket;
	}

}
