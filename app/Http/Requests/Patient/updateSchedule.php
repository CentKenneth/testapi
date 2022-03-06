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

            'case_history' => 'nullable',
            'other_history' => 'nullable',
            'chief_complaints' => 'nullable',
            'other_complaints' => 'nullable',
            'cornea' => 'nullable',
            'conjunctiva' => 'nullable',
            'eyelids' => 'nullable',
            'mgd' => 'nullable',
            'lens' => 'nullable',
            'pupil' => 'nullable',
            'iris' => 'nullable',
            'puncta' => 'nullable',
            'oldrx_od' => 'nullable',
            'oldrx_sph' => 'nullable',
            'oldrx_cx' => 'nullable',
            'oldrx_os' => 'nullable',
            'oldrx_os_sph' => 'nullable',
            'oldrx_os_cx' => 'nullable',
            'oldrx_add' => 'nullable',
            'newrx_od' => 'nullable',

            'newrx_sph' => 'nullable',
            'newrx_cx' => 'nullable',
            'newrx_os' => 'nullable',
            'newrx_os_sph' => 'nullable',
            'newrx_os_cx' => 'nullable',
            'newrx_add' => 'nullable',
            'fva_odsc' => 'nullable',
            'fva_ossc' => 'nullable',
            'fva_ousc' => 'nullable',
            'fva_odcc' => 'nullable',
            'fva_oscc' => 'nullable',

            'fva_oucc' => 'nullable',
            'nva_ousc' => 'nullable',
            'nva_oucc' => 'nullable',
            'nva_pdod' => 'nullable',
            'nva_pdos' => 'nullable',
            'nva_pdou' => 'nullable',
            'doctor_diagnosis' => 'nullable',
            'management' => 'nullable',
            'type_lens' => 'nullable',
            'type_frame' => 'nullable',
        ];
    }
}
