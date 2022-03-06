<?php

namespace App\Transformers;
use App\Models\PatientSchedule;

use League\Fractal\TransformerAbstract;

class PatientScheduleTransformer extends TransformerAbstract
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
    public function transform(PatientSchedule $patientSchedule)
    {
        $doctor = resolve('User')->getModel()->where('id', $patientSchedule->doctor_id)->get();
        $patient = resolve('User')->getModel()->where('id', $patientSchedule->patient_id)->get();
        $schedule = resolve('Schedule')->getModel()->where('id', $patientSchedule->schedule_id)->get();

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
            'payment_status' => $patientSchedule->payment_status,
            'payments' => $patientSchedule->payments,

            'case_history' => $patientSchedule->case_history,
            'other_history' => $patientSchedule->other_history,
            'chief_complaints' => $patientSchedule->chief_complaints,
            'other_complaints' => $patientSchedule->other_complaints,
            'cornea' => $patientSchedule->cornea,
            'conjunctiva' => $patientSchedule->conjunctiva,
            'eyelids' => $patientSchedule->eyelids,
            'mgd' => $patientSchedule->mgd,
            'lens' => $patientSchedule->lens,
            'pupil' => $patientSchedule->pupil,
            'iris' => $patientSchedule->iris,
            'puncta' => $patientSchedule->puncta,
            'oldrx_od' => $patientSchedule->oldrx_od,
            'oldrx_sph' => $patientSchedule->oldrx_sph,
            'oldrx_cx' => $patientSchedule->oldrx_cx,

            'oldrx_os' => $patientSchedule->oldrx_os,
            'oldrx_os_sph' => $patientSchedule->oldrx_os_sph,
            'oldrx_os_cx' => $patientSchedule->oldrx_os_cx,
            'oldrx_add' => $patientSchedule->oldrx_add,
            'newrx_od' => $patientSchedule->newrx_od,
            'newrx_sph' => $patientSchedule->newrx_sph,
            'newrx_cx' => $patientSchedule->newrx_cx,
            'newrx_os' => $patientSchedule->newrx_os,
            'newrx_os_sph' => $patientSchedule->newrx_os_sph,
            'newrx_os_cx' => $patientSchedule->newrx_os_cx,
            'newrx_add' => $patientSchedule->newrx_add,
            'fva_odsc' => $patientSchedule->fva_odsc,
            'fva_ossc' => $patientSchedule->fva_ossc,
            'fva_ousc' => $patientSchedule->fva_ousc,
            'fva_odcc' => $patientSchedule->fva_odcc,
            'fva_oscc' => $patientSchedule->fva_oscc,

            'fva_oucc' => $patientSchedule->fva_oucc,
            'nva_ousc' => $patientSchedule->nva_ousc,
            'nva_oucc' => $patientSchedule->nva_oucc,
            'nva_pdod' => $patientSchedule->nva_pdod,
            'nva_pdos' => $patientSchedule->nva_pdos,
            'nva_pdou' => $patientSchedule->nva_pdou,

            'doctor_diagnosis' => $patientSchedule->doctor_diagnosis,
            'management' => $patientSchedule->management,
            'type_lens' => $patientSchedule->type_lens,
            'type_frame' => $patientSchedule->type_frame,
        ];
    }
}
