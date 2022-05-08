<?php

namespace App\Http\Controllers\Freelancer;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreelancerEndContractController extends Controller
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
    public function create($id)
    {
        $contract = Contract::with('recruiter')->find(decrypt($id));
        return view('contents.freelancer.freelancer-end-contract')->with([
            'contract' => $contract,
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'private_rating' => 'required',
            'public_feedback' => 'required',
            'experience' => 'required',
        ]);

        $contract = Contract::find(decrypt($request->contract));
        $contract->freelancer_private_feedback_rating = $request->private_rating;
        $contract->freelancer_public_feedback_rating = $request->public_feedback;
        $contract->freelancer_public_feedback_comment = $request->experience;
        /**
         * Contract status:
         *  2 = active
         *  3 = ended
         *  5 = in review
         */
        if($contract->contract_status == "Active"){
            $contract->contract_status = 5;            
        }else if($contract->contract_status == "In Review"){
            $contract->contract_status = 3;
        }else{
            abort(403);
        }
        $contract->save();

        return route('freelancer.contract.index');
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
