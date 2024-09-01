<?php

namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\User;

class KeycloakProvider extends AbstractProvider
{
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(
            config('services.keycloak.base_url') . '/realms/' . config('services.keycloak.realm') . '/protocol/openid-connect/auth', $state
        );
    }

    protected function getTokenUrl()
    {
        return config('services.keycloak.base_url') . '/realms/' . config('services.keycloak.realm') . '/protocol/openid-connect/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
            config('services.keycloak.base_url') . '/realms/' . config('services.keycloak.realm') . '/protocol/openid-connect/userinfo', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]
        );

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['sub'],
            'nickname' => $user['preferred_username'],
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }
}
