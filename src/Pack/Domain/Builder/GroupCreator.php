<?php


namespace App\Pack\Domain\Builder;

use App\Pack\Domain\Builder\GroupBuilderInterface;
use App\Pack\Domain\Models\Group;

/**
 * Builder Director
 * Class GroupCreator
 * @package App\Pack\Domain\Builder
 */
class GroupCreator
{
    /**
     * @var GroupBuilderInterface
     */
    private GroupBuilderInterface $GroupBuilderInterface;

    /**
     * @param GroupBuilderInterface $GroupBuilderInterface
     * @return Group
     */
    public function build(GroupBuilderInterface $GroupBuilderInterface) : Group
    {
        $this->GroupBuilderInterface = $GroupBuilderInterface;
    }

}