<?php

namespace PEA\Http\Controllers\Authentication;

use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use PEA\Http\Controllers\BaseController;
use PEA\App\Models\User;

class AuthController extends BaseController
{
    public function redirectToKeycloak()
    {
        return Socialite::driver('keycloak')->redirect();
    }

    public function handleKeycloakCallback()
    {
        try {
            $keycloakUser = collect(Socialite::driver('keycloak')->user()->user);
            $user = User::updateOrCreate(
                [ 'provider_id' => $keycloakUser['sub'] ],
                [
                    'provider_type' => 'keycloak',
                    'employee_id' => $keycloakUser['hr_employee_id'],
                    'first_name' => $keycloakUser['hr_firstname'],
                    'last_name' => $keycloakUser['hr_lastname'],
                    'email' => $keycloakUser['email'],
                    'department' => $keycloakUser['hr_department'],
                    'position' => $keycloakUser['hr_position'],
                    'business_area' => $keycloakUser['hr_business_area'],
                    'mobile_phone' => $keycloakUser['hr_mobilephone'],
                    'last_login' => Carbon::now()
                ]
            );

            auth()->guard('web')->login($user, false);

            return redirect()->route('http::dashboard');
        } catch (\Exception $e) {
            logger()->error($e);

            return view('http::errors.500');
        }
    }

    public function login()
    {
        return view('http::auth.login');
    }

    public function logout()
    {
        auth()->guard('web')->logout();

        return redirect(Socialite::driver('keycloak')->getLogoutUrl());
    }
}
