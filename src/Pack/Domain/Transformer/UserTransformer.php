<?php

namespace App\Pack\Domain\Transformer;

use App\Pack\Domain\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends  TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'active' => $user->isActive()
        ];
    }
}