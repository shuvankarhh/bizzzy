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
        return view('admin.home');
    }
    public function staffCreate()
    {
        return view('admin.staff.add-staff');
    }
    public function staffStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'photo' => 'image'
        ]);

        $email = Email::create([
            'email' => $request->email
        ]);

        $email = Email::where('email', $request->email)->first();

        $password = bcrypt($request->password);

        if ($request->File('photo')) {
            $path = $request->photo->store('staff', ['disk' => 'public']);

            $staff = Staff::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'account_email_id' => $email->id,
                'password' => $password,
                'staff_role_id' => 1,
                'photo' => $path,
                'acting_status' => 1,
            ]);
        } else {
            $staff = Staff::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'account_email_id' => $email->id,
                'password' => $password,
                'staff_role_id' => 1,
                'acting_status' => 1,
            ]);
        };


        // return view('admin.add-staff');
    }

    public function staffList()
    {
        $list = Staff::all();

        return view('admin.staff.list-staff', ['lists' => $list]);
    }
    public function staffEdit($id)
    {

        $data = Staff::find($id);

        return view('admin.staff.edit-staff', ['staff' => $data]);
    }
    public function staffUpdate(Request $request)
    {

        $staff = Staff::find($request->id);
        $staff->name = $request->name;
        $staff->user_name = $request->user_name;
        $staff->staff_role_id = $request->staff_role_id;
        $staff->save();
        return redirect()->route('staff.list');
    }
}