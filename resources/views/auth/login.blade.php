@extends('components.template')

@section('title', 'login')

@section('content')
    <div class="flex flex-col justify-center items-center w-80 mx-auto h-[50vh] mt-40 bg-slate-400 rounded-2xl">
        <div class="mb-7">
            <h1 class="font-bold text-3xl text-center">Login</h1>
            <p>Selamat Datang di Contact App</p>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="flex flex-col mb-5">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="flex flex-col mb-5">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <p>Dont Have Account? <a href="/register" class="text-blue-500">Register</a></p>
            </div>
            <button type="submit" class="mt-5 px-3 py-2 bg-blue-300 rounded-md text-xs font-bold">Login</button>
        </form>
    </div>
@endsection
