<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use App\Models\Dispute;

class AdminContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jobs.list-disputecontract');
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
        $dispute = Dispute::find($id);
        $dispute->processed_by  = auth()->id();
        $dispute->status = 1;
        $dispute->save();
        Session::flash('message', 'Dispute successfully Approved!');
        return redirect()->route('contract.index');
    }

    public function resolve(Request $request, $id)
    {
        $dispute = Dispute::find($id);
        $dispute->processed_by  = auth()->id();
        $dispute->status = 2;
        $dispute->save();
        Session::flash('message', 'Dispute successfully Completed!');
        return redirect()->route('contract.index');
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
    public function getData()
    {
        $disputes = Dispute::with(['contract' => function($q){
            $q->with('recruiter', 'freelancer', 'job');
        }])->get();
        //return $verificatios_user;

        return DataTables::of($disputes)
            // ->editColumn('contract.id', function ($t) {
            //     return $t->user->name;
            // })

            ->addColumn('action', function ($t) {
                if($t->status==0){
                return " <a  href='" . route('contract.approve', $t->id) . "'  class='btn btn-info btn-xs'><i class='fa fa-folder'></i> Approve </a>";

                }else if($t->status == 1){
                    return "<a  href='" . route('contract.resolve', $t->id) . "'  class='btn btn-primary btn-xs'><i class='fa fa-folder'></i> Resolved </a>";
                }else{
                    return "Dispute Completed";
                }
                
            })
            ->toJson();
    }
}
