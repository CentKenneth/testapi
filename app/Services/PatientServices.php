<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\PatientScheduleTransformer;
use App\Transformers\PatientChatsTransformer;
use App\Transformers\PrescriptionTransformer;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use App\Helpers\ArrayHelper;
use PDF;
use Illuminate\Support\Facades\Storage;

class PatientServices
{
    public function store($data)
    {
        try {
            
            $patient_schedule = resolve('PatientSchedule')->store(collect($data)->toArray());
            return $patient_schedule;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function index(array $data)
    {
        try {
            $items = resolve('PatientSchedule')->index($data);

            if (ArrayHelper::isset($data, 'page')) {
                $items = $items
                ->paginate($data['limit']);
            } else {
                $items = $items->get();
            }

            return TransformerHelper::collection($items, new PatientScheduleTransformer, $data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function update(array $data, $id)
    {
        try {
            $items = resolve('PatientSchedule')->update($data, $id);

            return $items;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientChats(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('patient_id', $data['patient_id'])
                ->groupBy('doctor_id')
                ->get();

            return TransformerHelper::collection($items, new PatientChatsTransformer, $data);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorChats(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('doctor_id', $data['doctor_id'])
                ->groupBy('patient_id')
                ->get();

            return TransformerHelper::collection($items, new PatientChatsTransformer, $data);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientChatsByDoctor(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('patient_id', $data['patient_id'])
                ->where('doctor_id', $data['doctor_id'])
                ->orderBy('created_at','asc')
                ->get();

            return TransformerHelper::collection($items, new PatientChatsTransformer, $data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientChatsByPatient(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('patient_id', $data['patient_id'])
                ->where('doctor_id', $data['doctor_id'])
                ->orderBy('created_at','asc')
                ->get();

            return TransformerHelper::collection($items, new PatientChatsTransformer, $data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function storePatientChats($data)
    {
        try {
            
            $patient_chat = resolve('PatientChat')->store($data);
            return $patient_chat;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storePatientChatsWithUpload($data, UploadedFile $image = null)
    {
        try {

            $data['image'] = $image->getClientOriginalName();
            $data['image_url'] = url('/') . '/uploads/images/' .$image->getClientOriginalName();
            $image->storeAs('images', $image->getClientOriginalName(), 'public_uploads');

            $patient_chat = resolve('PatientChat')->store($data);
            return $patient_chat;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescription($data)
    {
        try {
            $items = resolve('Prescription')->getModel()
            ->where('patient_id', $data['patient_id'])
            ->groupBy('doctor_id')
            ->get();

            return TransformerHelper::collection($items, new PrescriptionTransformer, $data);

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescriptionByDoctor($data)
    {
        try {
            $items = resolve('Prescription')->getModel()
            ->where('patient_id', $data['patient_id'])
            ->where('doctor_id', $data['doctor_id'])
            ->get();

            return TransformerHelper::collection($items, new PrescriptionTransformer, $data);

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createPrescription($data)
    {
        try {

            $prescription = resolve('Prescription')->store($data);

            $datas['prescription'] = $prescription->toArray();

            $patient = resolve('User')->getModel()->where('id', $datas['prescription']['patient_id'])->get()->toArray();
            $doctor = resolve('User')->getModel()->where('id', $datas['prescription']['doctor_id'])->get()->toArray();

            $datas['patient'] = $patient[0];
            $datas['doctor']  = $doctor[0];

            $pdf = PDF::loadView('pdf.prescription', compact('datas'));

            $random = rand();

            $url = url('/') . '/uploads/' . $random . '' . $prescription->id . '.pdf';

            $prescription->url = $url;

            Storage::disk('public_uploads')->put( $random . '' . $prescription->id . '.pdf', $pdf->output());

            $pdf->download('pdf.prescription');

            $prescription->save();

            return $prescription;

        } catch (Exception $exception) {
            throw $exception;
        }
    }


}
