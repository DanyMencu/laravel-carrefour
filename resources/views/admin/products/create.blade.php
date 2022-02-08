@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Add new product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea type="text" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            
            {{-- Price --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
            </div>

            {{-- Allergen --}}
            <div class="mb-3">
                <h3>Allergens</h3>

                @foreach($allergens as $allergen)
                    <span class="d-inline-block mr-3">
                        <input type="checkbox" name="allergens[]" id="allergen{{ $loop->iteration }}" value="{{ $allergen->id }}"
                        @if(in_array($allergen->id, old('allergens', []))) checked @endif>
                        <label for="allergen{{ $loop->iteration }}">
                            {{ $allergen->name }}
                        </label>
                    </span>
                @endforeach
            </div>

            <button class="btn btn-success">Add a new product</button>
        </form>
    </div>
@endsection