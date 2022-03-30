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
        return view('get_started.question_five')->with([
            'title' => auth()->user()->freelance_profile->professional_title
        ]);
    }

    public function qEleven()
    {
    }

    public function qTwelve()
    {
        return view('get_started.question_twelve')->with([
            'hourly_rate' =>  (int)auth()->user()->freelance_profile->price_per_hour
        ]);
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
        return view('get_started.question_ten')->with([
            'name' => auth()->user()->name,
            'bio' => auth()->user()->freelance_profile->description
        ]);
    }

    public function qThirteen()
    {
        return view('get_started.question_thirteen')->with([
            'photo' => auth()->user()->photo,
            'address' => auth()->user()->address
        ]);
    }
}
