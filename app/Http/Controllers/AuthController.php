<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginSubmit(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($validated, true)) {
            return back()->withInput()->withErrors(['login'=>'نام کاربری یا رمز عبور اشتباه است.']);
        }

        if (auth()->user()->is_manager) {
            return redirect()->route('manager');
        }
        return redirect()->intended(route('home'));
    }
    public function signin(Request $request){
        return view('auth.signin');
    }
    public function signinSubmit(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'phone'=> 'required|numeric',
        ]);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
