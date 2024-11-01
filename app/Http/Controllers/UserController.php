<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("homepage", ['contacts' => $users]);
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
}
