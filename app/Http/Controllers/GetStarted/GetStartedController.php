<?php

namespace App\Http\Controllers\GetStarted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetStartedController extends Controller
{
    public function index()
    {
        return view('get_started.get_started')->with('name', auth()->user()->name);
    }

    public function qOne()
    {
        return view('get_started.question_one')->with('name', auth()->user()->name);
    }

    public function qTwo()
    {
        return view('get_started.question_two')->with('name', auth()->user()->name);
    }

    public function qThree()
    {
        return view('get_started.question_three')->with('name', auth()->user()->name);
    }
}
