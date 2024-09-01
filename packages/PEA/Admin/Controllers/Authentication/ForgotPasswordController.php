<?php
namespace AdsExchange\Http\Controllers\Authentication;

use AdsExchange\Account\Domain\Account;
use AdsExchange\Http\Controllers\BaseController;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use AdsExchange\Http\Requests\Authentication\ForgotPasswordRequest;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        return view('admin::auth.forgot-password');
    }

    public function forgot(ForgotPasswordRequest $request)
    {
        try {
            $email = $request->get('email');
            $user = Account::where('email', $email)->first();

            if ($user) {
                $user->reminders()->delete();
                $reminder = Reminder::create($user);

                //@todo send mail forgot password.

                $message = "success::Please check the email $email for setting a new account password";
                return redirect(route('http::auth.login'))->with('message', $message);

            } else {
                throw new \Exception("danger::The email {$email} not found.");
            }

        } catch (\Exception $e) {

            return redirect(route('http::auth.forgot-password'))->with('message', 'danger::' . $e->getMessage());
        }


    }
}
