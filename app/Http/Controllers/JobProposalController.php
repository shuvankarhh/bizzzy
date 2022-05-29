<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Contract;
use Stripe\StripeClient;
use App\Models\JobProposal;
use Illuminate\Http\Request;
use App\Models\ContractMilestone;
use App\Models\FreelancerProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobProposalRequest;
use Illuminate\Validation\ValidationException;

class JobProposalController extends Controller
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
     * Make Contract!
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobProposalRequest $request)
    {
        if($request->price < array_sum($request->deposit_amount)){
            throw ValidationException::withMessages(['deposit_amount', 'Total does not match!']);
        }

        $job_id = decrypt($request->job_id);
        $freelancer_id = decrypt($request->freelancer);

        $freelancer_gave_job_proposal = JobProposal::where('job_id', $job_id)->where('user_id', $freelancer_id)->first();
        if (is_null($freelancer_gave_job_proposal)) {
            abort(403);
        }

        $job_belongs_to_user = Job::where('id', $job_id)->where('user_id', auth()->id())->first();
        if (is_null($job_belongs_to_user)) {
            abort(403);
        }

        $transaction = DB::transaction(function () use ($request, $freelancer_id, $job_id, $freelancer_gave_job_proposal, $job_belongs_to_user) {
            if ($request->payment_type == 'hourly') {
                $price = $request->hourly_rate;
            } else {
                $price = $request->price;
            }
            $contract = Contract::create([
                'payment_type' => $request->payment_type,
                'price' => $price,
                'service_charge_type' => 1,
                'service_charge' => 20,
                'paid_amount' => 0,
                'is_fully_paid' => 0,
                'end_date' => null,
                'contract_status' => 1,
                'contract_confirmation_date' => now(),
                'created_by_user' => auth()->id(),
                'is_confirmed_by_client' => 1,
                'is_confirmed_by_freelancer' => 0,
                'job_id' => $job_id,
                'freelancer_id' => $freelancer_id,
                'additional_message' => $request->additional_message,
                'hours_per_week' => $request->hour_per_week
            ]);

            FreelancerProfile::where('user_id', $freelancer_id)->update([
                'total_jobs' => DB::raw('total_jobs + 1')
            ]);

            if ($request->payment_type == 'fixed') {
                if (!empty($request->milestone_name[0])) {
                    foreach ($request->milestone_name as $idx => $item) {
                        $mile_stones[] = [
                            'contract_id' => $contract->id,
                            'name' => $item,
                            'deposit_amount' => $request->deposit_amount[$idx],
                            'end_date' => $request->due_date[$idx],
                            'is_complete' => 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    ContractMilestone::insert($mile_stones);
                    $amount = $request->deposit_amount[0];
                } else {
                    ContractMilestone::create([
                        'contract_id' => $contract->id,
                        'name' => $job_belongs_to_user->name,
                        'deposit_amount' => $request->price,
                        'end_date' => NULL,
                        'is_complete' => 0,
                    ]);
                    $amount = $request->price;
                }
                $stripe = new StripeClient(config('stripe.stripe_secret'));
                $stripe_detail = auth()->user()->stripe_detail;

                if(is_null($stripe_detail)){
                    throw ValidationException::withMessages(['message', 'Something wrong with your payment method!']);
                }

                if($stripe_detail->status != '1'){
                    throw ValidationException::withMessages(['message', 'Your payment method is not verified!']);
                }
                
                $payment_methods = $stripe->paymentMethods->all(
                    ['customer' => $stripe_detail->customer_id, 'type' => 'card']
                );
                try {
                    $stripe->paymentIntents->create([
                        'amount' => $amount * 100,
                        'currency' => 'usd',
                        'customer' => $stripe_detail->customer_id,
                        'payment_method' => $payment_methods->data[0]->id,
                        'off_session' => true,
                        'confirm' => true,
                    ]);
                    $contract->milestone_security_balance = $amount;
                    $contract->save();
                } catch (\Stripe\Exception\CardException $e) {
                    // Error code will be authentication_required if authentication is needed
                    echo 'Error code is:' . $e->getError()->code;
                    $payment_intent_id = $e->getError()->payment_intent->id;
                    $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
                }
            }

            $freelancer_gave_job_proposal->contract_id = $contract->id;
            $freelancer_gave_job_proposal->save();
        });

        return route('recruiter.job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($freelancer, $job_id)
    {
        $job_proposal = JobProposal::with(['job' => function ($query) {
            $query->with('tags.tag', 'categories.category', 'proposal_files');
        }])->with('proposal_files', 'user')->where('user_id', decrypt($freelancer))->where('job_id', decrypt($job_id))->first();

        return view('contents.jobs.job-proposal')->with([
            'job_proposal' => $job_proposal,
            'stripe_details' => auth()->user()->stripe_details,
        ]);
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

    public function pre_validate(JobProposalRequest $request)
    {
        if($request->price < array_sum($request->deposit_amount)){
            throw ValidationException::withMessages(['deposit_amount', 'Total does not match!']);
        }
        return response('Successfully validated');
    }
}
