@extends('layout.app')

@section('content')
    <h1>Welcome, {{ $user->name }}!</h1>

    <nav>
        <ul>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/dashboard/edit-profile">Edit Profile</a></li>
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <h2>Book List</h2>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }} by {{ $book->author }}</li>
        @endforeach
    </ul>

    <form action="/search-books" method="POST">
        @csrf
        <input type="text" name="keyword" placeholder="Search books">
        <button type="submit">Search</button>
    </form>
@endsection