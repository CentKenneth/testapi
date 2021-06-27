<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class AuthHelper
{
    protected static $client;

    public static function isAuthenticated($token)
    {
        try {
            self::setClientWithToken($token);
            $response = self::$client->request('GET', \Config::get('tindah.api_endpoint').'/auth-details');
            $result = json_decode($response->getBody());

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public static function isAuthenticatedByRole($token, $role)
    {
        try {
            self::setClientWithToken($token);
            $response = self::$client->request('GET', \Config::get('tindah.api_endpoint').'/auth-details');
            $result = json_decode($response->getBody());

            return $result->data && $result->data->role == self::formattedRole($role) ? true : false;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public static function loginWithSocialite($token, $provider)
    {
        try {
            self::setClient();
            $response = self::$client->request('POST', \Config::get('tindah.domain').'/oauth/token', array(
                'form_params' => array(
                    'grant_type' => 'social',
                    'client_id' => \Config::get('tindah.client_id'),
                    'client_secret' => \Config::get('tindah.client_secret'),
                    'provider' => $provider,
                    'access_token' => $token
                )
            ));
            $result = json_decode($response->getBody());
            return collect($result)->toArray();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /* Private Classes */

    private static function setClientWithToken($token)
    {
        self::$client = new Client(array('headers' => array(
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
            'Authorization'     => 'Bearer '.$token
        )));
    }

    private static function setClient()
    {
        self::$client = new Client(array('headers' => array(
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json'
        )));
    }

    private static function formattedRole($role)
    {
        return $role ? ($role == 'it' ? TextHelper::uppercase($role) : TextHelper::format001($role)) : null;
    }
}