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

}
