<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function authDetails()
    {
        try {
            $user_id = \Auth::user()->id;
            return resolve('UserServices')->show($user_id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
