<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email;
use App\Models\Staff;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Staff::with('roles', 'email')->get();

        return view('admin.staff.list-staff', ['lists' => $list]);
    }

    public function loadroles()
    {
        $list = Role::get();

        return $list->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.add-staff')->with([
            'roles' => Role::where('guard_name', 'staff')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            $staff->assignRole($request->role);
        };

        Session::flash('message', 'New Staff successfully Added!');
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
    public function edit(Staff $id)
    {
        return $id->toJson();
        // $data = Staff::find($id);
        // return view('admin.staff.edit-staff', ['staff' => $data]);
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
        $staff = Staff::find($request->id);
        $staff->name = $request->name;
        $staff->user_name = $request->user_name;
        $staff->staff_role_id = $request->staff_role_id;
        if (!empty($request->file('photo'))) {
            $path = $request->file('photo')->store('freelancer/profile_photo', ['disk' => 'public']);
            $staff->photo = $path;
        }

        $staff->save();
        Session::flash('message', 'Staff successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('staff.index');
    }
}