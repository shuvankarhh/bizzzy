<?php

namespace App\Http\Controllers;

use App\Models\UserEmail;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class ResendEmailController extends Controller
{
    public function store(Request $request)
    {
        $email = Email::with('userEmail.user')->where('email', $request->email)->first();
        sleep(1);
        // Mail::to($email->email)->send(new EmailVerification($email->userEmail->user, $email->email, $email->userEmail->token));
    }
}
