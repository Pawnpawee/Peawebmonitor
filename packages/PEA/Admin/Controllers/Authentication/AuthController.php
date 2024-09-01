<?php
namespace PEA\Admin\Controllers\Authentication;

use Illuminate\Support\Facades\Auth;
use PEA\Admin\Controllers\BaseController;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use PEA\Admin\Requests\Authentication\AttemptRequest;

class AuthController extends BaseController
{
    public function login()
    {
        return view('admin::auth.login');
    }

    public function attempt(AttemptRequest $request)
    {
        $credentials = [
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
        ];

        try {
//            if ($account = Sentinel::authenticate($credentials)) {
//                Sentinel::login($account);
//
//                if (Sentinel::getUser()->isAdmin()) {
//                    return redirect()->intended(route('admin::dashboard'));
//                }
//
//                return redirect()->intended(route('http::dashboard'));
//            }

            if ($account = Auth::attempt($credentials)) {
//                Sentinel::login($account);
                $request->session()->regenerate();
//
//                if (Sentinel::getUser()->isAdmin()) {
                    return redirect()->intended(route('admin::dashboard'));
//                }
//
//                return redirect()->intended(route('http::dashboard'));
            }

            return redirect(route('admin::auth.login'))->with('message', 'danger::Invalid login email or password.');
        } catch (\Exception $e) {

            return redirect(route('admin::auth.login'))->with('message', 'danger::' . $e->getMessage());
        }
    }

    public function logout()
    {
        Sentinel::logout(null, true);

        return redirect(route('admin::auth.login'));
    }
}
