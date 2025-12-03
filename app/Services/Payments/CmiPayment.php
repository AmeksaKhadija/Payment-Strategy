<?php

namespace App\Services\Payments;

class CmiPayment implements PaymentMethod
{
    public function pay(float $amount): string
    {
        return "Paiement de $amount MAD via CMI réussi.";
    }
}
