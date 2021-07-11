<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\TransactionTransformer;

class TransactionServices
{
    public function store($data)
    {
        try {
            
            $transaction = resolve('Transaction')->store(collect($data)->toArray());
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storeAppointment($data)
    {
        try {
            
            $transaction = resolve('Transaction')->store(collect($data)->toArray());
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storePrescription($data)
    {
        try {
            
            $transaction = resolve('Transaction')->store(collect($data)->toArray());
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getTransactionByDoctorsEmail($email)
    {
        try {
            
            $transaction = resolve('Transaction')->getModel()->where('sendto', $email)->where('transactiontype', 'Schedule')->get();
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getAppointmentByPatientsEmail($email)
    {
        try {
            
            $transaction = resolve('Transaction')->getModel()->where('sendto', $email)->where('transactiontype', 'Appointment')->get();
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescriptionByDoctorsEmail($email)
    {
        try {
            
            $transaction = resolve('Transaction')->getModel()->where('sendto', $email)->where('transactiontype', 'Prescription')->get();
            return $transaction;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
