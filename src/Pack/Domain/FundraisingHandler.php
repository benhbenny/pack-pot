<?php


namespace App\Pack\Domain;


use App\Pack\Domain\Contract\FundraisingHandlerInterface;
use App\Pack\Domain\Contract\FundraisingStrategyInterface;
use App\Pack\Domain\ValueObject\Money;

class FundraisingHandler implements FundraisingHandlerInterface
{
    /**
     * @var FundraisingStrategyInterface[]
     */
    private $fundraisingType = [];

    /**
     * FundraisingHandler constructor.
     * @param \Iterator $fundraisingType
     */
    public function __construct(\Iterator $fundraisingType)
    {
        foreach ($fundraisingType as $type) {
            $this->fundraisingType[$type->getType()] = $fundraisingType;
        }
    }

    /**
     * @param string $fundRaisingType
     * @return Money
     */
    public function credit(string $fundRaisingType): Money
    {
        if (!isset($this->fundraisingType[$fundRaisingType])) {
            throw new \InvalidArgumentException('Invalid fundraising type.');
        }

        return $this->fundraisingType[$fundRaisingType]->credit();
    }

    /**
     * @param string $fundRaisingType
     * @return Money
     */
    public function debit(string $fundRaisingType): Money
    {
        if (!isset($this->fundraisingType[$fundRaisingType])) {
            throw new \InvalidArgumentException('Invalid fundraising type.');
        }

        return $this->fundraisingType[$fundRaisingType]->debit();
    }

    /**
     * @param string $fundRaisingType
     * @return Money
     */
    public function solde(string $fundRaisingType): Money
    {
        if (!isset($this->fundraisingType[$fundRaisingType])) {
            throw new \InvalidArgumentException('Invalid fundraising type.');
        }

        return $this->fundraisingType[$fundRaisingType]->solde();
    }
}