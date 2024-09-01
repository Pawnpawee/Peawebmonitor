<?php
namespace AdsExchange\Http\Controllers\Authentication;

use AdsExchange\Account\Domain\Account;
use AdsExchange\Http\Controllers\BaseController;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use AdsExchange\Http\Requests\Authentication\ResetPasswordRequest;

class ResetPasswordController extends BaseController
{
    public function index($token = null)
    {
        if (empty($token)) {
            return redirect(route('http::auth.forgot-password'))->with('message', 'danger::Missing token in request to an endpoint that requires a valid token.');
        }

        return view('admin::auth.reset-password', compact('token'));
    }

    public function reset(ResetPasswordRequest $request)
    {
        try {

            $email = $request->get('email');
            $token = $request->get('token');
            $password = $request->get('password');
            $user = Account::where('email', $email)->first();

            if (!$user) {
                throw new \Exception("An error has occurred while we were attempting to reset your password. Please check the information, and try again");
            }

            if(!Reminder::exists($user, $token)){
                throw new \Exception("The token is not valid for the given user");
            }

            if (!Reminder::complete($user, $token, $password)) {
                throw new \Exception("An error has occurred while we were attempting to reset your password. Please check the information, and try again");
            }

            return redirect(route('http::auth.login'))->with('message', 'success::Your account has been updated with the new password');

        } catch (\Exception $e) {
            return redirect(route('http::auth.reset-password', $token))->with('message', 'danger::' . $e->getMessage());
        }
    }
}
