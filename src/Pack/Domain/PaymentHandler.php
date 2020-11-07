<?php


namespace App\Pack\Domain;

use App\Pack\Domain\Contract\PayementStrategyInterface;
use App\Pack\Domain\Contract\PaymentHandlerInterface;
use App\Pack\Domain\Models\PaymentResponse;

class PaymentHandler implements PaymentHandlerInterface
{
    /**
     * @var PayementStrategyInterface[]
     */
    private $paymentMode = [];

    public function __construct(iterable $paymentMode)
    {
        foreach ($paymentMode as $payment) {
            $this->paymentMode[$payment->getName()] = $payment;
        }
    }

    /**
     * @param string $paymentMode
     * @return PaymentResponse
     */
    public function pay(string $paymentMode): PaymentResponse
    {
        if (!isset($this->paymentMode[$paymentMode])) {
            throw new \InvalidArgumentException('Invalid payement mode.');
        }

        return $this->paymentMode[$paymentMode]->pay();
    }
}