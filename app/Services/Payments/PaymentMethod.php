<?php

namespace App\Services\Payments;

interface PaymentMethod
{
    public function pay(float $amount): string;
}
