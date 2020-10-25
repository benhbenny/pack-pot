<?php
//Design Pattern Strategy

namespace App\Pack\Domain\Contract;

use App\Pack\Domain\ValueObject\Money;

/**
 * Interface PayementStrategyInterface
 * @package App\Pack\Domain\Contract
 */
interface PayementStrategyInterface
{
    /**
     * @return Money
     */
    public function pay(): Money;
}