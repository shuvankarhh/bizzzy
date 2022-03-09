<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Email;
use App\Models\UserEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function userLoginCreate(Request $request)
    {
        if(Auth::check()){
            return view('home');
        }
        return view('authentication.login');
    }

    public function userLoginStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = Email::with('userEmail')->where('email', $request->email)->first();

        if(is_null($email)){
            return back()->withErrors([
                'email' => 'Email Does Not Exist.',
            ]);
        }

        if(is_null($email->userEmail->verified_at)){
            return view('authentication.verify_email', [
                'email' => $email->email
            ]);
        }

        if (Auth::attempt(['account_email_id' => $email->id, 'password' => $request->password])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userRegisterEmail(Request $request)
    {
        $request->validate(['email' => 'required']);

        $email = Email::where('email' , $request->email)->first();

        if(is_null($email)){
            return view('authentication.registration', [
                'email' => $request->email
            ]);
        }

        $user = User::where('account_email_id', $email->id)->first();
        if(!is_null($user)){
            return redirect()->route('user.login')->with('meassage', 'Email Already exists! Please Login!');
        }

        if($email->userEmail){
            return view('authentication.verify_email', [
                'email' => $email->email
            ]);
        }
    }

    public function userRegisterCreate()
    {
        return view('authentication.signup');
    }

    public function userRegisterStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'aggrement' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
            'freelancer_or_recuriter' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $email = Email::create([
                'email' => $request->email
            ]);

            $user_data = array(
                'name' => $request->first_name . ' ' . $request->last_name,
                'user_name' => $request->first_name,
                'password' => bcrypt($request->password),
                'acting_status' => 1,
            );

            $user = User::create($user_data);

            UserEmail::create([
                'user_id' => $user->id,
                'email_id' => $email->id,
                'verification_token' => Str::random(10),
                'acting_status' => 1,
            ]);
        });

        return view('authentication.verify_email', [
            'email' => $request->email
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function userVerifyEmailCreate()
    {
        return view('authentication.verify_email');
    }

    public function userVerifyEmailStore($email, $token)
    {
        $verified = Email::with('userEmail.user')->where('email', $email)->first();

        if(is_null($verified)){
            return;
        }

        if(!is_null($verified->userEmail->verified_at)){
            return;
        }

        $verified->userEmail->verified_at = now();
        $verified->userEmail->save();

        $verified->userEmail->user->account_email_id = $verified->id;
        $verified->userEmail->user->save();
        // User::where()
    }
}
