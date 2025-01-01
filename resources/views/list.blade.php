@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <ul class="list-group w-50">
    <a type="button" href="/product/create" class="btn btn-success mb-3 sticky-top" style="z-index: 2;">New Car</a>
    @foreach($cars as $car)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ $car->avatar ? asset('storage/' . $car->avatar) : url('https://via.placeholder.com/150') }}" 
                     alt="Avatar" 
                     class="img-thumbnail" 
                     style="max-width: 100px; max-height: 100px; object-fit: cover;">

                <div>
                    <strong>Mark:</strong> {{ $car->mark }} <br>
                    <strong>Model:</strong> {{ $car->model }} <br>
                    <strong>Type:</strong> {{ $car->type }} <br>
                    <strong>Hp:</strong> {{ number_format($car->hp, 2) }} <br>
                    <strong>Price:</strong> ${{ number_format($car->price, 2) }}
                </div>
            </div>
            <div>
                <a href="/product/update/{{ $car->id }}" class="btn btn-primary btn-sm me-2">Update</a>
                <form action="{{ route('remove', ['id' => $car->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
