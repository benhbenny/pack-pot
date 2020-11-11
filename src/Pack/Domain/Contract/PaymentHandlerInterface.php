<?php


namespace App\Pack\Domain\Contract;


use App\Pack\Domain\Models\PaymentResponse;

/**
 * Interface PaymentHandlerInterface
 * @package App\Pack\Domain\Contract
 */
interface PaymentHandlerInterface
{
    /**
     * @param string $paymentMode
     * @return PaymentResponse
     */
    public function pay(string $paymentMode) : PaymentResponse;
}