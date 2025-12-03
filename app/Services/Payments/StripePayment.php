<?php

namespace App\Services\Payments;

class StripePayment implements PaymentMethod
{
    public function pay(float $amount): string
    {
        return "Paiement de $amount MAD via Stripe réussi.";
    }
}
