<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Email;
use App\Models\HUser;
use App\Models\UserEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Models\FreelancerProfile;
use App\Models\UserAccount;
use App\Models\UserOnlinePresence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    public function userLoginCreate(Request $request)
    {
        if (Auth::check()) {
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

        if (is_null($email) or is_null($email->userEmail)) {
            return back()->withErrors([
                'email' => 'Email Does Not Exist.',
            ]);
        }

        if (is_null($email->userEmail->verified_at)) {
            return redirect()->route('user.verification-need.email', ['email' => $email->email]);
        }

        if (Auth::attempt(['account_email_id' => $email->id, 'password' => $request->password])) {
            $request->session()->regenerate();
            $request->session()->put('user_type', auth()->user()->userAccount[0]->client_or_freelancer);

            return redirect()->intended('user/create/get-started');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userRegisterEmail(Request $request)
    {
        $request->validate(['email' => 'required']);

        $email = Email::where('email', $request->email)->first();

        if (is_null($email)) {
            return view('authentication.registration', [
                'email' => $request->email
            ]);
        }

        $user = User::where('account_email_id', $email->id)->first();
        if (!is_null($user)) {
            return redirect()->route('user.login')->with('message', 'Email Already exists! Please Login!');
        }

        if ($email->userEmail) {
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

        $data = DB::transaction(function () use ($request) {
            $email = Email::create([
                'email' => $request->email
            ]);

            $password = bcrypt($request->password);

            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'user_name' => $request->first_name,
                'password' => $password,
                'acting_status' => 1,
            ]);

            if ($request->freelancer_or_recuriter == 'freelancer') {
                FreelancerProfile::create([
                    'user_id' => $user->id,
                    'profile_completion_percentage' => 0,
                    'total_jobs' => 0,
                    'total_hours' => 0,
                    'average_rating' => 0,
                    'is_top_rated' => 0,
                ]);
                UserAccount::create([
                    'user_id' => $user->id,
                    'client_or_freelancer' => 2,
                    'company_or_individual' => 2,
                ]);
            } else {
                UserAccount::create([
                    'user_id' => $user->id,
                    'client_or_freelancer' => 1,
                    'company_or_individual' => 2,
                ]);
            }

            $token = Str::random(10);

            UserEmail::create([
                'user_id' => $user->id,
                'email_id' => $email->id,
                'verification_token' => $token,
                'acting_status' => 1,
            ]);

            UserOnlinePresence::create([
                'user_id' => $user->id,
                'last_seen' => now()
            ]);

            return array('user' => $user, 'token' => $token);
        });

        // Mail::to($request->email)->send(new EmailVerification($data['user'], $data['token'], $request->email));

        return redirect()->route('user.verification-need.email', ['email' => $request->email]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function userVerifyEmailCreate($email)
    {
        return view('authentication.verify_email')->with('email', $email);
    }

    public function userVerifyEmailStore($email, $token)
    {
        $verified = Email::with('userEmail.user')->where('email', $email)->first();

        if (is_null($verified)) {
            return;
        }

        if (!is_null($verified->userEmail->verified_at)) {
            return redirect()->route('user.login')->with('message', 'Email already verified!');
        }

        $verified->userEmail->verified_at = now();
        $verified->userEmail->save();

        $verified->userEmail->user->account_email_id = $verified->id;
        $verified->userEmail->user->save();

        return redirect()->route('user.login')->with('message', 'Verification Complete!');
        // User::where()
    }
}
