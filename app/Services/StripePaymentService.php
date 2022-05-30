<?php
namespace App\Services;

class StripePaymentService{
    private $secret;

    function __construct()
    {
        $this->secret = config('stripe.stripe_secret');
    }
}