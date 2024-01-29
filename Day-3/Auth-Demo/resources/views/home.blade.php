@extends('layouts.main')

@section('content')
    <div class="alert alert-info">
        Home page is public, any one can access!
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('profile') }}" class="btn btn-primary">Go to profile</a>
        </div>
    </div>
@endsection