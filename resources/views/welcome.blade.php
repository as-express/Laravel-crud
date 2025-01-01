@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column mt-5">
        <h1>Authorization</h1>
        <div class="mb-5"
        ">
            <a href="/auth/signup" role="button" class="btn btn-primary">Sign Up</a>
            <a href="/auth/signin" role="button" class="btn btn-primary">Sign In</a>
        </div>
    </div>
@endsection
