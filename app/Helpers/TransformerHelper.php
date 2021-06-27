<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\TransformerAbstract;

class TransformerHelper
{
    /**
     * Transform a collection
     *
     * @param $items
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param array $data = null
     * @param array $meta = null
     * @return transformed collection
     */
    public static function collection($items, TransformerAbstract $transformer, array $data = null, array $meta = null)
    {
        /**
         * Determine if the request has page
         */
        if ($data && ArrayHelper::isset($data, 'page')) {
            return fractal()
            ->collection($items, $transformer)
            ->addMeta($meta)
            ->paginateWith(new IlluminatePaginatorAdapter($items))
            ->toArray();
        } else {
            return fractal()
            ->collection($items, $transformer)
            ->addMeta($meta)
            ->toArray();
        }
    }

    /**
     * Transform an item
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param array $meta = null
     * @return transformed item
     */
    public static function item(Model $model, TransformerAbstract $transformer, array $meta = null)
    {
        return fractal()->item($model, $transformer)->addMeta($meta)->toArray();
    }
}