<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VerificationRequest;
use DateTime;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class VerificationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.verification-user');
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
        $user = VerificationRequest::find($id);
        $user->approved_at = Carbon::now();
        $user->admin_id = auth()->id();
        $user->status = 1;
        $user->note  = "Verified User";
        $user->save();
        Session::flash('message', 'User successfully Approved!');
        return redirect()->route('user.verification.index');
    }
    public function reject(Request $request, $id)
    {
        $user = VerificationRequest::find($id);
        $user->approved_at = Carbon::now();
        $user->admin_id = auth()->id();
        $user->status = 2;
        $user->note  = "Rejacted by Admin";
        $user->save();
        Session::flash('message', 'User successfully Rejacted!');
        return redirect()->route('user.verification.index');
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
        $verificatios_user = VerificationRequest::with('user', 'email')->get();
        //return $verificatios_user;

        return DataTables::of($verificatios_user)
            ->editColumn('user.name', function ($t) {
                return $t->user->name;
            })
            ->editColumn('user.user_name', function ($t) {
                return $t->user->user_name;
            })

            ->addColumn('action', function ($t) {
                return "<a  href='" . route('user.get.photo', $t->id) . "'  class='btn btn-primary btn-xs'><i class='fa fa-folder'></i> Photo </a>
                <a  href='" . route('user.verified', $t->id) . "'  class='btn btn-info btn-xs'><i class='fa fa-folder'></i> Approve </a>
                <a  href='" . route('user.reject', $t->id) . "'  class='btn btn-danger btn-xs'><i class='fa fa-folder'></i> Reject </a>";
            })
            ->toJson();
    }

    public function downloadPhoto($id)
    {
        $ver = VerificationRequest::find($id);
        return Storage::download($ver->attachment);
    }
}