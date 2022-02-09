@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-3">Edit {{ $product->name }}</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea type="text" name="description" id="description"
                class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
            @error('price')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- Categories --}}
        <div class="mb-3">
            <label for="category_id">Category:</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Uncategorized</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == old('category_id',$product->category_id))
                    selected
                    @endif>
                    {{$category->status}}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{$message}}</div>
            @enderror

            {{-- Allergen --}}
            <div class="my-3">
                <h3>Allergens</h3>

                @foreach($allergens as $allergen)
                <span class="d-inline-block mr-3">
                    <input type="checkbox" name="allergens[]" id="allergen{{ $loop->iteration }}"
                        value="{{ $allergen->id }}" @if($errors->any() && in_array($allergen->id, old('allergens')))
                    checked
                    @elseif(!$errors->any() && $product->allergens->contains($allergen->id))
                    checked
                    @endif>

                    <label for="allergen{{ $loop->iteration }}">
                        {{ $allergen->name }}
                    </label>
                </span>
                @endforeach
                @error('allergens')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-success">Edit a product</button>
    </form>
    <div class="row">
        <a href="{{route('admin.products.index')}}" class="back-to mt-4">
            <i class="fas fa-arrow-left icon-back-to"></i>
            Back to Archive
        </a>
    </div>
</div>
@endsection