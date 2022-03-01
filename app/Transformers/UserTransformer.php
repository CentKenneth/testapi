<?php

namespace App\Transformers;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'profile' => $user->profile,
            'zip' => $user->zip,
            'country' => $user->country,
            'city' => $user->city,
            'street_address' => $user->street_address,
            'height' => $user->height,
            'weight' => $user->weight,
            'bday' => $user->bday
        ];
    }
}
