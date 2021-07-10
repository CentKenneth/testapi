<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDoctor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'degreelevel' => 'required',
            'degreefield' => 'required',
            'bday' => 'required',
            'gender' => 'required',
            'clinicname' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6|max:255',
            'role' => 'required'
        ];
    }
}
