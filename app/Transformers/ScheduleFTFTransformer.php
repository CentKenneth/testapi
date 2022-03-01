<?php

namespace App\Transformers;
use App\Models\Faceschedule;

use League\Fractal\TransformerAbstract;

class ScheduleFTFTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Faceschedule $schedule)
    {
        return [
            'id' => $schedule->id,
            'name' => $schedule->name,
            'start' => $schedule->start,
            'end' => $schedule->end,
            'status' => $schedule->status,
        ];
    }
}
