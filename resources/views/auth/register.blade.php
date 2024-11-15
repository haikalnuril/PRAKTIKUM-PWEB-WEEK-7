@extends('components.template')

@section('title', 'Register')

@section('content')

<div class="flex flex-col justify-center items-center w-80 mx-auto h-[80vh] bg-slate-400 rounded-2xl">
    <div class="mb-7">
        <h1 class="font-bold text-3xl text-center">Register</h1>
        <p>Selamat Datang di Contact App</p>
    </div>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="flex flex-col mb-5">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            @error("name")
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-5">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            @error("email")
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-5">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" required>
            @error("phone")
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-5">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            @error("username")
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-5">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error("password")
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-5">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <p>Already Have Account? <a href="/login" class="text-blue-500">Login</a></p>
        </div>
        <button type="submit" class="mt-5 px-3 py-2 bg-blue-300 rounded-md text-xs font-bold">Register</button>
    </form>
</div>

@endsection