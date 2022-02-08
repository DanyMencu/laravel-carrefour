@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Edit {{ $product->name }}</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')

            {{-- Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea type="text" name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>
            
            {{-- Price --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
            </div>

            {{-- Allergen --}}
            <div class="mb-3">
                <h3>Allergens</h3>

                @foreach($allergens as $allergen)
                    <span class="d-inline-block mr-3">
                        <input type="checkbox" name="allergens[]" id="allergen{{ $loop->iteration }}" value="{{ $allergen->id }}"

                        @if($errors->any() && in_array($allergen->id, old('allergens'))) 
                            checked
                        @elseif(!$errors->any() && $product->allergens->contains($allergen->id))
                            checked
                        @endif>

                        <label for="allergen{{ $loop->iteration }}">
                            {{ $allergen->name }}
                        </label>
                    </span>
                @endforeach
            </div>

            <button class="btn btn-success">Edit a product</button>
        </form>
    </div>
@endsection