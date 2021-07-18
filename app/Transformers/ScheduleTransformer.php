<?php

namespace App\Transformers;
use App\Models\Schedule;

use League\Fractal\TransformerAbstract;

class ScheduleTransformer extends TransformerAbstract
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
    public function transform(Schedule $schedule)
    {
        return [
            'id' => $schedule->id,
            'name' => $schedule->name,
            'start' => $schedule->start,
            'end' => $schedule->end,
        ];
    }
}
