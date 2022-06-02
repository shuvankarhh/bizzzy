<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;

class AdminMoneyWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.withdraw.withdraw-list');
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

    public function datatable()
    {
        $withdraw_request = WithdrawRequest::with('user')->get();
        //return $withdraw_request;

        return DataTables::of($withdraw_request)
        // ->editColumn('user.name', function ($t) {
        //     return $t->user->name;
        // })
        // ->editColumn('user.user_name', function ($t) {
        //     return $t->user->user_name;
        // })
        ->addColumn('approval', function($q){
            if($q->status == 0){
                return "<span class='badge badge-danger'>Not Approved</span>";
            }
        })

        ->addColumn('action', function ($t) {
            return " PENDING WORK! ";
        })
        ->rawColumns(['approval', 'action'])
        ->toJson();
    }
}
