@extends('layouts.main')

@section('content')
    <div class="alert alert-warning">
        Profile page is private, only user can access!
    </div>

    <div class="row">
        <div class="col">
            <button class="btn btn-primary" onclick="event.preventDefault(); document.querySelector('form').submit()">Logout</button>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
@endsection