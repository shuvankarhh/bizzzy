<?php

namespace App\Http\Controllers\GetStarted;

use App\Http\Controllers\Controller;
use App\Models\Skill;
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

    public function qFour()
    {
        return view('get_started.question_four')->with('name', auth()->user()->name);
    }

    public function qFive()
    {
        return view('get_started.question_five')->with('name', auth()->user()->name);
    }

    public function qEleven()
    {
        return view('get_started.question_eleven')->with('name', auth()->user()->name);
    }

    public function qTwelve()
    {
        return view('get_started.question_twelve')->with('name', auth()->user()->name);
    }




    public function qnine()
    {
        return view('get_started.question_nine')->with([
            'name' => auth()->user()->name,
            'skills' => Skill::get(),
        ]);
    }

    public function qTen()
    {
        return view('get_started.question_ten')->with('name', auth()->user()->name);
    }
}
