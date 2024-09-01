<?php

namespace AdsExchange\Admin\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;


class UpdatePasswordRequest extends FormRequest
{

	public function rules ()
	{
		return [
			'password' => 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&.*-]).{6,}$/',
		];
	}

	public function authorize()
	{
		return true;
	}
}