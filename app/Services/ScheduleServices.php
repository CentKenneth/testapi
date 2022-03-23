<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\ScheduleTransformer;
use App\Transformers\ScheduleFTFTransformer;
use App\Transformers\UserTransformer;
use Carbon\Carbon;

class ScheduleServices
{
    public function store($data)
    {
        try {
            
            $transaction = resolve('Schedule')->store(collect($data)->toArray());
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storeFtoF($data)
    {
        try {
            
            $transaction = resolve('Faceschedule')->store(collect($data)->toArray());
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function index($data)
    {
        try {
            
            $transaction = resolve('Schedule')->getModel()
                        ->whereDate('start','>=', $data['start'])
                        ->whereDate('start', '<=', $data['end'])
                        ->where('user_id', $data['user_id'])
                        ->get();

            return TransformerHelper::collection($transaction, new ScheduleTransformer, $data);

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function indexFtoF($data)
    {
        try {
            
            $transaction = resolve('Faceschedule')->getModel()
                        ->whereDate('start','>=', $data['start'])
                        ->whereDate('start', '<=', $data['end'])
                        ->where('user_id', $data['user_id'])
                        ->get();

            return TransformerHelper::collection($transaction, new ScheduleFTFTransformer, $data);

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function delete($id)
    {
        try {
            
            $transaction = resolve('Schedule')->destroy($id);

            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function deleteChat($id)
    {
        try {
            
            $transaction = resolve('PatientChat')->destroy($id);

            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function deleteFtoF($id)
    {
        try {
            
            $transaction = resolve('Faceschedule')->destroy($id);

            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function update($data, $id)
    {
        try {
            
            $transaction = resolve('Schedule')->update($data, $id);

            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function updateFtoF($data, $id)
    {
        try {
            
            $transaction = resolve('Faceschedule')->update($data, $id);

            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorBySpecialization($name)
    {
        try {
            
            $doctor = resolve('User')->getModel()->where('degreefield', $name)->get();

            return $doctor;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorScheduleById($id)
    {
        try {

            $schedule = resolve('Schedule')->getModel()->where('user_id', $id)->get();

            return $schedule;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorScheduleByIdFacetoFace($id)
    {
        try {

            $schedule = resolve('Faceschedule')->getModel()->where('user_id', $id)->get();

            return $schedule;

        } catch (Exception $exception) {
            throw $exception;
        }
    }


}
