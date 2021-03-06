<?php

namespace App\Transformers;
use App\Models\PatientChat;

use League\Fractal\TransformerAbstract;

class PatientChatsTransformer extends TransformerAbstract
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
    public function transform(PatientChat $patientChat)
    {
        $doctor = resolve('User')->getModel()->where('id', $patientChat->doctor_id)->get();
        $patient = resolve('User')->getModel()->where('id', $patientChat->patient_id)->get();

        return [
            'id' => $patientChat->id,
            'doctor_id' => $patientChat->doctor_id,
            'patient_id' => $patientChat->patient_id,
            'patient_name' => $patient[0]->name,
            'doctor_name' => $doctor[0]->name,
            'messages' => $patientChat->messages,
            'created_at' => $patientChat->created_at,
            'whosend' => $patientChat->whosend,
            'image' => $patientChat->image,
            'is_view' => $patientChat->is_view,
            'profile' => $doctor[0]->profile,
            'image_url' => $patientChat->image_url,
        ];
    }
}
