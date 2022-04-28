<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\Email;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        // return view('admin.home');
        return view('admin.layouts.home');
    }
    public function staffCreate()
    {
    }
    public function staffStore(Request $request)
    {




        // return view('admin.add-staff');
    }

    public function staffList()
    {
    }
    public function staffEdit($id)
    {
    }
    public function staffUpdate(Request $request)
    {
    }

    public function admin()
    {
        return view('admin.layouts.home');
    }
}