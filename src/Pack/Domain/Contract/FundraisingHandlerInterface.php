<?php


namespace App\Pack\Domain\Contract;


use App\Pack\Domain\ValueObject\Money;

/**
 * Interface FundraisingHandlerInterface
 * @package App\Pack\Domain\Contract
 */
interface FundraisingHandlerInterface
{
    /**
     * @param string $fundRaisingType
     * @return Money
     */
    public function credit(string $fundRaisingType) : Money;

    /**
     * @param string $fundRaisingType
     * @return Money
     */
    public function debit(string $fundRaisingType) : Money;

    /**
     * @param string $fundRaisingType
     * @return Money
     */
    public function solde(string $fundRaisingType) : Money;
}