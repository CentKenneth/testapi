<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\UserTransformer;

class UserServices
{

    public function show($id)
    {
        try {
            $item = resolve('User')->getModel()->find($id);

            return TransformerHelper::item($item, new UserTransformer);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function store($data)
    {
        try {
            
            $user = resolve('User')->store(collect($data)->toArray());
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storeDoctor($data)
    {
        try {
            
            $user = resolve('User')->store(collect($data)->toArray());
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorEmail()
    {
        try {
            
            $user = resolve('User')->getModel()->where('role', 'doctor')->get();
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
