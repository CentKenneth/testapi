<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrescription extends FormRequest
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
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'prescription' => 'required',
            'medicines' => 'nullable',
            'license' => 'nullable',
            'signature' => 'sometimes|image',
        ];
    }
}
