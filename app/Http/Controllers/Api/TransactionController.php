<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Transaction\Schedule;

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

    public function getTransactionByDoctorsEmail($email)
    {
        try {
            
            return resolve('TransactionServices')->getTransactionByDoctorsEmail($email);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
