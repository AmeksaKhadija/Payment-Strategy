<?php

namespace App\Services\Payments;

class PaypalPayment implements PaymentMethod
{
    public function pay(float $amount): string
    {
        return "Paiement de $amount MAD via PayPal réussi.";
    }
}
