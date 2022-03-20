<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function submitProfile()
    {
        return view('profile.submit_profile')->with('name', auth()->user()->name);
    }
}