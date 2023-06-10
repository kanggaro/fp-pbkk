@extends('layout.app')

@section('content')
    <h1>Edit Profile</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/edit-profile" method="POST">
        @csrf
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="{{ $user->first_name }}">
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}">
        </div>
        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}">
        </div>
        <button type="submit">Save</button>
    </form>
@endsection