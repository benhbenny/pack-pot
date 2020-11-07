<?php


namespace App\Pack\Domain\Models;


use App\Pack\Domain\Contract\PayementStrategyInterface;
use App\Pack\Domain\ValueObject\Money;

class Cash implements PayementStrategyInterface
{
    const CASH = 'CASH';

    /**
     * @var string
     */
    private string $owner;

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
        return self::CASH;
    }
}