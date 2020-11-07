<?php


namespace App\Pack\Domain\Models;


use App\Pack\Domain\Contract\PayementStrategyInterface;
use App\Pack\Domain\ValueObject\Money;

class Card implements PayementStrategyInterface
{
    const CARD = 'CARD';

    /**
     * @var int
     */
    private int $cardnumber;

    /**
     * @var \DateTime
     */
    private \DateTime $expirationDate;

    /**
     * @var string
     */
    private string $owner;

    /**
     * @var int
     */
    private int $secret;


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
        return self::CARD;
    }
}