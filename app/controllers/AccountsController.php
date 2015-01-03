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

		$account = new Account;

		$account->Login           = $data['username'];
		$account->PasswordHash    = md5($data['password']);
		$account->Nickname        = $data['username'];
		$account->Role            = 1;
		$account->Ticket          = $this->GenTicket();
		$account->SecretQuestion  = '2 + 2';
		$account->SecretAnswer    = '4';
		$account->Lang            = 'fr';
		$account->Email           = $data['email'];
		$account->CreationDate    = date('Y-m-d H:i:s');
		$account->SubscriptionEnd = '0001-01-01 00:00:00';

		$account->save();

		Auth::login($account);

		return Redirect::route('home');
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

		$user = Account::where('Login', $data['username'])->first();

		if ($user && $user->PasswordHash == md5($data['password']))
		{
			Auth::login($user);

			return Redirect::intended('/');
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
