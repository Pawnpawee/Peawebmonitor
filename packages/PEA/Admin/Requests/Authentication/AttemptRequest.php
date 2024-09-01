<?php
namespace PEA\Admin\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class AttemptRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
