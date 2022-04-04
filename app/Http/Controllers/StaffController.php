<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Staff::all();

        return view('admin.staff.list-staff', ['lists' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.add-staff');
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

            Staff::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'account_email_id' => $email->id,
                'password' => $password,
                'staff_role_id' => 1,
                'photo' => $path,
                'acting_status' => 1,
            ]);
        } else {
            Staff::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'account_email_id' => $email->id,
                'password' => $password,
                'staff_role_id' => 1,
                'acting_status' => 1,
            ]);
        };
        return redirect()->route('staff.index');
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
        $data = Staff::find($id);

        return view('admin.staff.edit-staff', ['staff' => $data]);
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
        $staff->save();
        return redirect()->route('staff.index');
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
}
