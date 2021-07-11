<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Transaction\Schedule;
use App\Http\Requests\Transaction\ScheduleAppointment;
use App\Http\Requests\Transaction\TransactionPrescription;

class TransactionController extends Controller
{
    public function scheduleTransaction(Schedule $request)
    {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('TransactionServices')->store($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function appointmentTransaction(ScheduleAppointment $request)
    {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('TransactionServices')->storeAppointment($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function prescriptionTransaction(TransactionPrescription $request)
    {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('TransactionServices')->storePrescription($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getTransactionByDoctorsEmail($email)
    {
        try {
            
            return resolve('TransactionServices')->getTransactionByDoctorsEmail($email);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

  

    public function getTransactionByPatientsEmail($email)
    {
        try {
            
            return resolve('TransactionServices')->getTransactionByPatientsEmail($email);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getAppointmentByPatientsEmail($email)
    {
        try {
            
            return resolve('TransactionServices')->getAppointmentByPatientsEmail($email);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescriptionByDoctorsEmail($email)
    {
        try {
            
            return resolve('TransactionServices')->getPrescriptionByDoctorsEmail($email);
        } catch (Exception $exception) {
            throw $exception;
        }
    }


}
