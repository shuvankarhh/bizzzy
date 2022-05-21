<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->id);
        if (auth()->user()->isRecruiter()) {
            return view('contents.settings.recruiter-setting')->with([
                'recruiter' => auth()->user()->recruiter_profile,
                'verification' => auth()->user()->verification_request
            ]);
        } else {
            return view('contents.settings.freelancer-settings')->with([
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