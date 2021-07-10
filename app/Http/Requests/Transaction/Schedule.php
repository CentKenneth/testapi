<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class Schedule extends FormRequest
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
            'user_id' => 'required',
            'sendto' => 'required',
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
            'sysmptoms' => 'required'
        ];
    }
}
