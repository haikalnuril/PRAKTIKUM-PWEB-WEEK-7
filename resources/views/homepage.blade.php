@extends('components.template')

@section('title', 'homepage')

@section('content')
    <h1>Ini Homepage</h1>
    <p>Selamat datang di Contact App {{ $user->credential->user_id }}</p>

    <div class="my-5">
        <a class="px-3 py-2 rounded-lg text-white bg-green-500 hover:bg-green-700" href="{{ route('create-user') }}">Create User</a>
    </div>

    <div>
        <table border="1" class="border">
            <thead class="border">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                    <a href="{{ route('edit-user', $contact->id) }}" class="px-2 py-1 rounded-lg text-white bg-yellow-500 hover:bg-yellow-700">Edit</a>
                    <form action="{{ route('delete-user', $contact->id) }}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button class="px-2 py-1 rounded-lg text-white bg-red-500 hover:bg-red-700" type="submit">Delete</button>
                    </form>
                </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
