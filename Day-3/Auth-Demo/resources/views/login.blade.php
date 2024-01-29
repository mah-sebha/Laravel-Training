@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center">Login</h2>
        <form action="{{ route('do_login') }}" method="POST">
            <!-- CSRF Token -->
            @csrf

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="{{ route('register') }}" class="btn btn-link">Register</a>
        </form>
    </div>
</div>
@endsection