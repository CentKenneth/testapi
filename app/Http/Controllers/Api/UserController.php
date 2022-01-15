<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Register;
use App\Http\Requests\User\RegisterDoctor;
use App\Http\Requests\User\UpdateUser;
use App\Http\Requests\User\ChangePassword;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout()
    {
        Auth::Logout();
    }

    public function changePassword(ChangePassword $request)
    {
        try {
            $password = \Auth::user()->password;
            $data = [];

            if(\Hash::check($request->oldpassword, $password)) {
                $data['password'] = bcrypt($request->password);

                return resolve('UserServices')->updateUser($data, \Auth::user()->id);
            } else {
                return response()->json('Old password did not match', 405);
            }

        } catch (Exception $exception) {
            throw $exception;
        }
    }

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
    
    public function registerDoctor(registerDoctor $request)
    {
        try {

            $data = collect($request->validated())
            ->except('password_confirmation')
            ->toArray();

            $data['password'] = bcrypt($request['password']);
            $data['name'] = $request['firstname']. ' ' .$request['lastname'];

            return resolve('UserServices')->storeDoctor($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorEmail()
    {
        try {
            return resolve('UserServices')->getDoctorEmail();
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientEmail()
    {
        try {
            return resolve('UserServices')->getPatientEmail();
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function updateUser(UpdateUser $request)
    {
        try {
            $data = collect($request->validated())
            ->except(['id'])
            ->toArray();

            return resolve('UserServices')->updateUser($data, $request->id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
