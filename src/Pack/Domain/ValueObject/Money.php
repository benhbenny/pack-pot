<?php


namespace App\Pack\Domain\ValueObject;


use App\App\Domain\ValueObject\Currency;

/**
 * Class Money
 * @package App\Pack\Domain\ValueObject
 */
final class Money
{

    /**
     * @var int
     */
    private int $amount;

    /**
     * @var Currency
     */
    private Currency $currency;

    /**
     * Money constructor.
     * @param int $amount
     * @param Currency $currency
     */
    public function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @param Money $money
     * @return bool
     */
    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount
            && $this->currency->equals($money->currency);
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param Money $toAdd
     * @return $this
     */
    public function add(Money $toAdd): Money
    {
        if ($this->currency !== $toAdd->currency) {
            throw new InvalidArgumentException("You can only add money with the same currency");
        }
        if ($toAdd->amount === 0) {
            return $this;
        }
        return new Money($this->amount + $toAdd->amount, $this->currency);
    }
}