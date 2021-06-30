<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\Register;

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

    public function registerUser(Register $request)
    {
        try {

            $data = collect($request->validated())
            ->except('password_confirmation')
            ->toArray();

            $data['password'] = bcrypt($request['password']);
            $data['name'] = $request['firstname']. ' ' .$request['lastname'];

            return resolve('UserServices')->store($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
