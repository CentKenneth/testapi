<?php

namespace App\Transformers;
use App\Models\PatientScheduleFace;

use League\Fractal\TransformerAbstract;

class PatientScheduleFaceTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PatientScheduleFace $patientSchedule)
    {
        $doctor = resolve('User')->getModel()->where('id', $patientSchedule->doctor_id)->get();
        $patient = resolve('User')->getModel()->where('id', $patientSchedule->patient_id)->get();
        $schedule = resolve('Faceschedule')->getModel()->where('id', $patientSchedule->schedule_id)->get();
        $numberTrans = resolve('PatientScheduleFace')->getModel()->where('patient_id', $patient[0]->id)->get()->count();

        return [
            'id' => $patientSchedule->id,
            'patient_id' => $patientSchedule->patient_id,
            'doctor_id' => $patientSchedule->doctor_id,
            'doctors_name' => $doctor[0]->name,
            'patient_name' => $patient[0]->name,
            'patient_phone' => $patient[0]->phone,
            'patient_email' => $patient[0]->email,
            'diagnosis' => $patientSchedule->diagnosis,
            'schedule' => $schedule[0]->start,
            'bday' => $patientSchedule->bday,
            'address' => $patientSchedule->address,
            'weigth' => $patientSchedule->weigth,
            'heigth' => $patientSchedule->heigth,
            'diagnosis' => $patientSchedule->diagnosis,
            'status' => $patientSchedule->status,
            'created_at' => $patientSchedule->created_at,
            'num_trans' => $numberTrans,
        ];
    }
}
