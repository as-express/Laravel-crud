@extends('layouts.app')

@section('title', 'Product List')
@section('content')
    <form method="POST" class="w-35" action="{{route('insert')}}">
        @csrf
        @method('post')
        <div class="mb-2">
            <input type="text" placeholder="mark" name="mark" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <input type="text" placeholder="model" name="model" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-2">
            <input type="text" placeholder="type" name="type" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-2">
            <input placeholder="hp" type="text" name="hp" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-2">
            <input placeholder="price" type="text" name="price" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="mb-5 btn btn-success">Submit</button>
        <a type="button" class="mb-5 btn btn-primary" href="/product">Exit</a>
    </form>
    @endsection