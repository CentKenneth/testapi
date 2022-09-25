<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\PatientScheduleTransformer;
use App\Transformers\PatientScheduleFaceTransformer;
use App\Transformers\PatientChatsTransformer;
use App\Transformers\PrescriptionTransformer;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use App\Helpers\ArrayHelper;
use PDF;
use Illuminate\Support\Facades\Storage;

class PatientServices
{
    public function store($data, array $images)
    {
        try {

            $patient_schedule = resolve('PatientSchedule')->store(collect($data)->toArray());

            if(sizeof($images) > 0) {
                $imagesData = [];

                foreach ($images as $image) {
                    $obj['schedules_id'] = $patient_schedule->id;
                    $obj['image'] = url('/') . '/uploads/images/' .$image->getClientOriginalName();
                    $image->storeAs('images', $image->getClientOriginalName(), 'public_uploads');

                    array_push($imagesData, $obj);
                }

                if(sizeof($imagesData) > 0) {
                    resolve('PatientSchedulesImages')->getModel()->insert($imagesData);
                }

            }

            return $patient_schedule;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storeFace($data)
    {
        try {
            
            $patient_schedule = resolve('PatientScheduleFace')->store(collect($data)->toArray());
            return $patient_schedule;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printScheduleFace(array $data)
    {
        try {
            $items = resolve('PatientScheduleFace')->index($data);
            
            $items = $items->get();

            $datas = TransformerHelper::collection($items, new PatientScheduleFaceTransformer, $data);
            
            $pdf = PDF::loadView('pdf.reports', compact('datas'));

            $random = rand();
            $random2 = rand();

            $url = url('/') . '/uploads/' . $random . '' . $random2 . '.pdf';

            $prescription['url'] = $url;

            Storage::disk('public_uploads')->put( $random . '' . $random2 . '.pdf', $pdf->output());

            $pdf->download('pdf.reports');

            return $prescription;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function printSchedule(array $data)
    {
        try {
            $items = resolve('PatientSchedule')->index($data);
            
            $items = $items->get();

            $datas = TransformerHelper::collection($items, new PatientScheduleTransformer, $data);
            
            $pdf = PDF::loadView('pdf.reports', compact('datas'));

            $random = rand();
            $random2 = rand();

            $url = url('/') . '/uploads/' . $random . '' . $random2 . '.pdf';

            $prescription['url'] = $url;

            Storage::disk('public_uploads')->put( $random . '' . $random2 . '.pdf', $pdf->output());

            $pdf->download('pdf.reports');

            return $prescription;
        } catch (\Exception $exception) {
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

    public function indexFace(array $data)
    {
        try {
            $items = resolve('PatientScheduleFace')->index($data);

            if (ArrayHelper::isset($data, 'page')) {
                $items = $items
                ->paginate($data['limit']);
            } else {
                $items = $items->get();
            }

            return TransformerHelper::collection($items, new PatientScheduleFaceTransformer, $data);
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

    public function updateFace(array $data, $id)
    {
        try {
            $items = resolve('PatientScheduleFace')->update($data, $id);

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

    public function PatientChatsNotifications(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('patient_id', $data['patient_id'])
                ->where('whosend', 'Doctor')
                ->orderBy('id','desc')
                ->limit(5)
                ->get();

            return TransformerHelper::collection($items, new PatientChatsTransformer, $data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function DoctorChatsNotifications(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('doctor_id', $data['doctor_id'])
                ->where('whosend', 'Patient')
                ->orderBy('id','desc')
                ->limit(5)
                ->get();

            return TransformerHelper::collection($items, new PatientChatsTransformer, $data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function PatientChatsUpdateNotifications(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('patient_id', $data['patient_id'])
                ->update(array('is_view' => 'Yes'));

            return $items;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function DoctorChatsUpdateNotifications(array $data)
    {
        try {
            $items = resolve('PatientChat')
                ->getModel()
                ->where('doctor_id', $data['doctor_id'])
                ->update(array('is_view' => 'Yes'));

            return $items;
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

    public function createPrescription($data, UploadedFile $image = null)
    {
        try {

            $data['signature'] = url('/') . '/uploads/images/' .$image->getClientOriginalName();
            $image->storeAs('images', $image->getClientOriginalName(), 'public_uploads');

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
