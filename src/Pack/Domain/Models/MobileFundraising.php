<?php


namespace App\Pack\Domain\Models;


use App\Pack\Domain\ValueObject\Money;
use App\Pack\Domain\Contract\FundraisingStrategyInterface;

class MobileFundraising implements FundraisingStrategyInterface
{
    /**
     * @var int
     */
    private int $phoneNumber;

    /**
     * @var string
     */
    private string $mobileOperator;

    /**
     * @var string
     */
    private string $iban;

    /**
     * @var string
     */
    private string $owner;

    /**
     * @inheritDoc
     */
    public function credit(): Money
    {
        // TODO: Implement credit() method.
    }

    /**
     * @inheritDoc
     */
    public function debit(): Money
    {
        // TODO: Implement debit() method.
    }

    /**
     * @inheritDoc
     */
    public function solde(): Money
    {
        // TODO: Implement solde() method.
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        // TODO: Implement getType() method.
    }
}