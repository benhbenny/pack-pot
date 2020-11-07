<?php


namespace App\Pack\Domain\Contract;


use App\Pack\Domain\Models\PaymentResponse;

interface PaymentHandlerInterface
{
    public function pay(string $paymentMode) : PaymentResponse;
}