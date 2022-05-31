<?php
namespace App\Services;

use Exception;
use Illuminate\Validation\ValidationException;
use Stripe\StripeClient;

class StripePaymentService{
    private $secret;
    private $stripe;
    private $customer;

    function __construct($customer = null)
    {
        $this->secret = config('stripe.stripe_secret');
        $this->stripe = new StripeClient($this->secret);
        $this->customer = $customer;
    }

    public function getPaymentMethods(String $customer = NULL, String $type = 'card')
    {
        if(is_null($this->customer) AND is_null($customer)){
            return 'Please provide customer';
        }

        if(is_null($customer)){
            $customer = $this->customer;
        }

        return $this->stripe->paymentMethods->all(
            ['customer' => $customer, 'type' => $type]
        );
    }

    public function makeOffSessionPayment(String $payment_method, $amount, String $customer = NULL)
    {
        if(is_null($this->customer) AND is_null($customer)){
            return 'Please provide customer';
        }

        if(is_null($customer)){
            $customer = $this->customer;
        }
        try{
            $this->stripe->paymentIntents->create([
                'customer' => $customer,
                'amount' => $amount * 100,
                'currency' => 'usd',
                'payment_method' => $payment_method,
                'off_session' => true,
                'confirm' => true,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            // Error code will be authentication_required if authentication is needed
            throw ValidationException::withMessages(['payment_method' => $e->getMessage()]);
        }
    }


}