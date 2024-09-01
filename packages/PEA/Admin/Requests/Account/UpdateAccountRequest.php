<?php
namespace AdsExchange\Admin\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{

	public function rules ()
	{
	    $id = $this->account->id;
		$rules = [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:account_users,email,'.$id,
		];

		return $rules;
	}

	public function authorize ()
	{
		return true;
	}
}
