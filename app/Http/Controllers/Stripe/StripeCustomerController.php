<?php

namespace App\Http\Controllers\Stripe;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StripeCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        $stripe = new StripeClient('sk_test_51L0fgqG8hFiNbPotF2SBgiKkMqeUUduFUawBp1t3nRuGaAQwBTP6rvJg5JnVpUyvEyQuxXmYLCeeKe4UOD9kDJHd00eSg6JHan');

        $intent = $stripe->paymentIntents->create(
            [
                'amount' => 1099,
                'currency' => 'eur',
                'automatic_payment_methods' => ['enabled' => true],
            ]
        );
        Stripe::setApiKey(config('stripe.stripe_key'));
        $customer = Customer::create([
            'email' => 'test@test.com',
            'name' => 'Jhon Doe'
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
