<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.settings.freelancer-settings')->with([
            'freelancer' => auth()->user()->freelance_profile
        ]);
    }
}
