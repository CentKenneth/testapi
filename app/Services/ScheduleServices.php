<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\ScheduleTransformer;

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

    public function delete($id)
    {
        try {
            
            $transaction = resolve('Schedule')->destroy($id);

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


}
