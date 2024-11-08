@extends('components.template')

@section('title', 'landing')

@section('content')
    <h1>Ini Landing</h1>
    <p>Selamat datang di landing saya</p>
    @auth
    <p>Anda sudah login</p>
    @endauth
@endsection