<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsers extends FormRequest
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
            'id' => 'nullable',
            'temppass' => 'nullable',
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'bday' => 'nullable',
            'gender' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'street_address' => 'nullable',
            'city' => 'nullable',
            'password' => 'nullable|string|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6|max:255',
            'role' => 'nullable',
            'zip' => 'nullable',
            'country' => 'nullable',
            'degreelevel' => 'nullable',
            'degreefield' => 'nullable',
            'clinicname' => 'nullable',
            'profile' => 'sometimes|image',
        ];
    }
}
