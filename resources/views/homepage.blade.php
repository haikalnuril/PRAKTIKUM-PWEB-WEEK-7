@extends('components.template')

@section('title', 'homepage')

@section('content')
    <h1>Ini Homepage</h1>
    <p>Selamat datang di Contact App</p>

    <div>
        <table border="1" class="border">
            <thead class="border">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact["name"] }}</td>
                        <td>{{ $contact["email"] }}</td>
                        <td>{{ $contact["phone"] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
