<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class PrintPatientSchedule extends FormRequest
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
            'start' => 'nullable',
            'end' => 'nullable',
            'single_date' => 'nullable',
            'search' => 'nullable',
            's_fields' => 'nullable',
            'doctor_id' => 'nullable',
            'pat_id' => 'nullable'
        ];
    }
}
