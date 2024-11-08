<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function () {
    return view("auth/login",);
})->name("login");
Route::post("/login", [AuthController::class, "authenticate"]);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);



Route::get("/home", [UserController::class, "index"])->name("homepage")->middleware('auth');
Route::get("/create-user", [UserController::class, "create"])->name("create-user");
Route::post("/create-user", [UserController::class, "store"])->name("store-user");
Route::get("/edit-user/{user}", [UserController::class, "edit"])->name("edit-user");
Route::put("/update-user/{user}", [UserController::class, "update"])->name("update-user");