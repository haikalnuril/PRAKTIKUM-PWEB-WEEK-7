<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as Authorize;
use App\Models\User;
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
            "email" => "required|email|unique:users,email",
            "phone" => "required|unique:users,phone",
            "username" => "required",
            "password" => "required|min:6|confirmed"
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone
            ]);

            Auth::create([
                "user_id" => $user->id,
                "name" => $request->name,
                "username" => $request->username,
                "password" => bcrypt($request->password)
            ]);

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }

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
