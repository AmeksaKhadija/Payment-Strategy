<?php

namespace APP\Services\Payments;

use App\Services\Payments\PaymentMethod;

class PaymentService
{
    private PaymentMethod  $method;

    public function __construct(PaymentMethod $method)
    {
        $this->method = $method;
    }

    public function process(float $amount): string
    {
        return $this->method->pay($amount);
    }
}
