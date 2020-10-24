<?php


namespace App\Pack\Domain\Transformer;

use App\Pack\Domain\Models\Group;
use League\Fractal\TransformerAbstract;

class GroupTransformer extends TransformerAbstract
{
    public function transform(Group $group)
    {
        return [
            'id' => $group->getId(),
            'code' => $group->getCode(),
            'name' => $group->getName(),
            'description' => $group->getDescription(),
            'active' => $group->isActive()
        ];
    }
}