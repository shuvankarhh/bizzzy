<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractMilestone;
use Illuminate\Support\Facades\DB;

class ContractMilestoneController extends Controller
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
    public function create($contract_milestone)
    {
        $contract_milestone = ContractMilestone::with('contract')->find(decrypt($contract_milestone));
        $max_id = ContractMilestone::select(DB::raw('MAX(id) as max_id'))->where('contract_id', $contract_milestone->contract->id)->first();
        return view('components.milestone-details')->with([
            'contract_milestone' => $contract_milestone,
            'max_id' => $max_id->max_id
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
    public function update(Request $request, $id)
    {
        $milestone = ContractMilestone::with('contract')->find(decrypt($id));
        if($milestone->contract->created_by_user != auth()->id()){
            abort(403);
        }

        $milestone->is_complete = 1;
        $milestone->save();

        return redirect()->back();
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
