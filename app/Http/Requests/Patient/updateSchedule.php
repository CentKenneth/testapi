<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class updateSchedule extends FormRequest
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
            'id' => 'required',
            'bday' => 'nullable',
            'address' => 'nullable',
            'weigth' => 'nullable',
            'heigth' => 'nullable',
            'diagnosis' => 'nullable',
            'status' => 'nullable',
            'payments' => 'nullable',
            'payment_status' => 'nullable',
        ];
    }
}
