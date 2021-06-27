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

}
