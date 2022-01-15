<?php

namespace App\Transformers;
use App\Models\Prescription;

use League\Fractal\TransformerAbstract;

class PrescriptionTransformer extends TransformerAbstract
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
    public function transform(Prescription $prescription)
    {
        $doctor = resolve('User')->getModel()->where('id', $prescription->doctor_id)->get();
        $patient = resolve('User')->getModel()->where('id', $prescription->patient_id)->get();

        return [
            'id' => $prescription->id,
            'doctor_id' => $prescription->doctor_id,
            'patient_id' => $prescription->patient_id,
            'patient_name' => $patient[0]->name,
            'doctor_name' => $doctor[0]->name,
            'url' => $prescription->url,
            'prescription' => $prescription->prescription
        ];
    }
}
