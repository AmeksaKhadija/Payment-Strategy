<?php

namespace App\Services\Payments;

class PaymentFactory
{

    public static function create(string $method): PaymentMethod
    {
        return match ($method) {
            'stripe' => new StripePayment(),
            'paypal' => new PaypalPayment(),
            'cmi' => new CmiPayment(),
            default => throw new \Exception("Mèthode de payment invalide"),
        };
    }
}
