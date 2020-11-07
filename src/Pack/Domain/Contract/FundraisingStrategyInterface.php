<?php
//Design Pattern strategy

namespace App\Pack\Domain\Contract;

use App\Pack\Domain\ValueObject\Money;

/**
 * Interface FundraisingStrategyInterface
 * @package App\Pack\Domain\Contract
 */
interface FundraisingStrategyInterface
{
    /**
     * @return Money
     */
    public function credit() : Money;

    /**
     * @return Money
     */
    public function debit() : Money;

    /**
     * @return Money
     */
    public function solde() : Money;

    /**
     * @return string
     */
    public function getType(): string;
}