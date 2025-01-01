@extends('layouts.app')

@section('title', 'SIGN UP')
@section('content')
    <form method="POST" class="w-35" action="{{route('signup')}}">
        @csrf
        @method('post')
        <div class="mb-2">
            <input type="text" placeholder="username" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <input type="text" placeholder="email" name="email" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-2">
            <input type="text" placeholder="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="mb-5 btn btn-success">Submit</button>
        <a type="button" class="mb-5 btn btn-primary" href="/auth/signin">Sign In</a>
    </form>
    @endsection