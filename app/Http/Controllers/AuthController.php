<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Authorize;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth/register");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "username" => "required",
            "password" => "required|min:6|confirmed"
        ]);

        Auth::create([
            "name" => $request->name,
            "username" => $request->username,
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route("login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Authorize::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back();
    }

    public function logout(){
        Authorize::logout();

        return redirect()->route("login");
    }
}
