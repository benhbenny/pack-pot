<?php
//Design Pattern Strategy

namespace App\Pack\Domain\Contract;

use App\Pack\Domain\Models\PaymentResponse;
use App\Pack\Domain\ValueObject\Money;

/**
 * Interface PayementStrategyInterface
 * @package App\Pack\Domain\Contract
 */
interface PayementStrategyInterface
{
    /**
     * @param Money $money
     * @return PaymentResponse
     */
    public function pay(Money $money): PaymentResponse;

    /**
     * @return string
     */
    public function getName(): string;
}