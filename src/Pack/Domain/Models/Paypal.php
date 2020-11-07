<?php


namespace App\Pack\Domain\Models;


use App\Pack\Domain\Contract\PayementStrategyInterface;
use App\Pack\Domain\ValueObject\Money;

class Paypal implements PayementStrategyInterface
{
    protected const PAYPAL = 'PAYPAL';

    /**
     * @param Money $money
     * @return PaymentResponse
     */
    public function pay(Money $money): PaymentResponse
    {
        // TODO: Implement pay() method.
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::PAYPAL;
    }
}