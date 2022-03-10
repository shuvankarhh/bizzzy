<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class SocialController extends Controller
{

public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    try {
            $user = Socialite::driver('google')->user();
            $existing_user = User::where('google_id', $user->id)->first();

            if($existing_user){
                Auth::login($user);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    // 'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'acting_status' => '1'
                ]);
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
   }
}