<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Email;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function showLoginFrom()
    {
        if (Auth::guard('admin')->id()) {
            return redirect('admin/home');
        } else {
            return view('admin.authentication.login');
        }
    }



    public function adminLoginStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = Email::where('email', $request->email)->first();


        if (is_null($email)) {
            return back()->withErrors([
                'email' => 'Email Does Not Exist.',
            ]);
        }


        if (Auth::guard('admin')->attempt(['account_email_id' => $email->id, 'password' => $request->password])) {
            // dd('in');
            $request->session()->regenerate();

            return redirect()->intended('admin/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}