<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stripe_details = auth()->user()->stripe_detail;
        if(!is_null($stripe_details) AND $stripe_details->payment_intent == $request->payment_intent AND $stripe_details->status != '1' AND isset($request->redirect_status) AND $request->redirect_status == 'succeeded'){            
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $payment_methods = $stripe->paymentMethods->all(
                ['customer' => $stripe_details->customer_id, 'type' => 'card']
            );
            $stripe_details->status = 3;
            $stripe_details->last4 = $payment_methods->data[0]->card->last4;
            $stripe_details->save();
        }

        if(session('user_type') == 1){
            return view('contents.settings.recruiter-setting')->with([
                'recruiter' => auth()->user()->recruiter_profile,
                'verification' => auth()->user()->verification_request
            ]);
        } else {
            return view('contents.settings.freelancer-settings')->with([
                'stripe_detail' => $stripe_details,
                'cards' => auth()->user()->cards,
                'freelancer' => auth()->user()->freelance_profile,
                'verification' => auth()->user()->verification_request
            ]);
        }
    }
    public function membership()
    {
        return view('contents.settings.plus-plan');
    }

    public function planUpdate()
    {
        $user = User::find(auth()->id());
        $user->membership = 1;
        $user->save();
        return back();
    }
}