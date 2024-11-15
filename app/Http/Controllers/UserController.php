<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->user_id)->first();
        // $user = Auth::user(); -> cara normal ketika tidak ditukar loginnya
        $users = User::all();
        return view("homepage", compact("user", "users"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone
        ]);

        return redirect()->route("homepage");
    }

    public function edit(User $user) {
        return view("edit", compact("user"));
    }

    public function update(Request $request, User $user) {
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone
        ]);

        return redirect()->route("homepage");
    }

    public function delete(User $user) {
        $user->delete();

        return redirect()->route("homepage");
    }
}
