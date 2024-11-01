<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function () {
    
    return view("login",);
});

Route::get("/home", [UserController::class, "index"])->name("homepage");
Route::get("/create-user", [UserController::class, "create"])->name("create-user");
Route::post("/create-user", [UserController::class, "store"])->name("store-user");
Route::get("/edit-user/{user}", [UserController::class, "edit"])->name("edit-user");
Route::put("/update-user/{user}", [UserController::class, "update"])->name("update-user");