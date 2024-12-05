<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Lgin Form
    public function login_view()
    {
        return view('auth.login');
    }

    //User Login
    public function login(Request $request)
    {
        //Validation
        $request->all(
            [
                'email'    => 'required',
                'password' => 'required',
            ]
        );

        //Login
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard')->with('success', 'Login successfully');
            } else {
                Auth::logout();
                return back()->with('error', 'Dont have permission');
            }
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    //Register Form
    public function register_view()
    {
        return view('auth.register');
    }

    //User Register
    public function register(Request $request)
    {
        //Validation
        $request->validate(
            [
                'name'                  => 'required|max:40',
                'email'                 => 'required|max:100',
                'password'              => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6|same:password',
            ]
        );

        //Create User
        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        //Redirect
        if ($user) {
            return redirect()->route('login')->with('success', 'Account created successfully, please login');
        } else {
            return redirect()->route('register')->with('error', 'Something went wrong');
        }
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login')->with('success', 'Logout successfully');
    }
}
