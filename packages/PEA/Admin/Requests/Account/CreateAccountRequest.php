<?php
namespace AdsExchange\Admin\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{
	public function rules ()
	{
		$rules = [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required'
		];

		if($this->method() === 'POST') {
			$rules['password'] = 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&.*-]).{6,}$/';
		}

		return $rules;
	}

	public function authorize ()
	{
		return true;
	}

}