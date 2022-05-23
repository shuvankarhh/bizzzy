<?php

namespace App\Http\Controllers\Stripe;

use Stripe\Customer;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StripeCardController extends Controller
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
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $stripe_detail = auth()->user()->stripe_detail;

        if(empty($stripe_detail)){
            $customer_response = $stripe->customers->create([
                'email' => auth()->user()->email->email,
                'name' => auth()->user()->name
            ]);
            $stripe_detail = auth()->user()->stripe_detail()->create([
                'customer_id' => $customer_response->id,
                'status' => 2
            ]);
            $customer_id = $customer_response->id;
        }else{
            $customer_id = $stripe_detail->customer_id;
        }

        $random_amount = rand(100, 400);
        $stripe_detail->amount_to_verify = $random_amount;
        $paymentIntent = $stripe->paymentIntents->create([
            'customer' => $customer_id,
            'setup_future_usage' => 'off_session',
            'amount' => $random_amount,
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        $stripe_detail->payment_intent = $paymentIntent->id;
        $stripe_detail->save();

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];
    
        return response()->json($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $stripe_detail = auth()->user()->stripe_detail;
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $stripe->refunds->create(['payment_intent' => $stripe_detail->payment_intent]);
        $credited = $request->credited_amount * 100;
        if($stripe_detail->amount_to_verify === (int)$credited){
            $stripe_detail->status = 1;
            $stripe_detail->save();
            echo 'done';
        }
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

    public function subsiquentRequest()
    {
        $stripe = new StripeClient('sk_test_51L0fgqG8hFiNbPotF2SBgiKkMqeUUduFUawBp1t3nRuGaAQwBTP6rvJg5JnVpUyvEyQuxXmYLCeeKe4UOD9kDJHd00eSg6JHan');
        $payment_methods = $stripe->paymentMethods->all(
            ['customer' => 'cus_LjDNkk3uFLxIlL', 'type' => 'card']
        );
        try {
            $stripe->paymentIntents->create([
                'amount' => 1099,
                'currency' => 'usd',
                'customer' => 'cus_LjDNkk3uFLxIlL',
                'payment_method' => $payment_methods->data[0]->id,
                'off_session' => true,
                'confirm' => true,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            // Error code will be authentication_required if authentication is needed
            echo 'Error code is:' . $e->getError()->code;
            $payment_intent_id = $e->getError()->payment_intent->id;
            $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        }
    }
}
