@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <form method="POST" class="w-35" action="{{ route('update', ['id' => $car->id]) }}">
        @csrf
        @method('PUT') <!-- Correct method for update -->

        <div class="mb-2">
            <input type="text" placeholder="mark" name="mark" class="form-control" value="{{ $car->mark }}">
        </div>
        <div class="mb-2">
            <input type="text" placeholder="model" name="model" class="form-control" value="{{ $car->model }}">
        </div>
        <div class="mb-2">
            <input type="text" placeholder="type" name="type" class="form-control" value="{{ $car->type }}">
        </div>
        <div class="mb-2">
            <input placeholder="hp" type="text" name="hp" class="form-control" value="{{ $car->hp }}">
        </div>
        <div class="mb-2">
            <input placeholder="price" type="text" name="price" class="form-control" value="{{ $car->price }}">
        </div>

        <button type="submit" class="mb-5 btn btn-success">Submit</button>
        <a type="button" class="mb-5 btn btn-primary" href="/product">Exit</a>
    </form>
@endsection
