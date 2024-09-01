<?php
namespace AdsExchange\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
