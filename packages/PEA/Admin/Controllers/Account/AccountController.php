<?php

namespace PEA\Admin\Controllers\Account;

use PEA\Account\Domain\Account;
use PEA\Admin\Controllers\BaseController;
use PEA\Admin\Requests\Account\CreateAccountRequest;
use PEA\Admin\Requests\Account\UpdateAccountRequest;
use PEA\Admin\Requests\Account\UpdatePasswordRequest;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Hash;

class AccountController extends BaseController
{
	public function index()
	{
		$accounts = Account::filters(request()->query())
            ->paginate();

		return view('admin::account.index', compact('accounts'));
	}

	public function create()
	{
		return view('admin::account.create');
	}

	public function store(CreateAccountRequest $request)
	{
		$data = [
			'email' => $request->get('email'),
			'password' => $request->get('password'),
			'first_name' => $request->get('first_name'),
			'last_name' => $request->get('last_name')
		];

		$account = Sentinel::register($data);
		$account->promoteToSuper();

		return redirect(route('admin::account'))->with('message', 'success::The account has been created.');
	}

	public function edit(Account $account)
	{
		return view('admin::account.edit', compact('account'));
	}

	public function update(UpdateAccountRequest $request, Account $account)
	{
		$account->fill($request->all());
		$account->save();

		return redirect(route('admin::account'))->with('message', 'success::The account has been updated.');
	}

	public function resetPassword(Account $account)
	{
		return view('admin::account.reset-password', compact('account'))->with('message', 'success::The password has been updated.');
	}

	public function updatePassword(UpdatePasswordRequest $request, Account $account)
	{
		$account->password = Hash::make($request->password);
		$account->save();

		return redirect(route('admin::account'));
	}

	public function delete(Account $account)
	{
		$account->delete();

		return redirect(route('admin::account'))->with('message', 'success::The account has been deleted.');
	}
}
