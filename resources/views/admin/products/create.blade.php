@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-3">Add new product</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea type="text" name="description" id="description" class="form-control">{{ old('description') }}
            </textarea>
            @error('description')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
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
                <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>
                    {{$category->status}}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- types --}}
        <div class="mb-3">
            <label for="type_id">Type:</label>
            <select class="form-control" name="type_id" id="type_id">
                <option value="">Uncategorized</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" @if($type->id == old('type_id')) selected @endif>
                    {{$type->name}}
                </option>
                @endforeach
            </select>
            @error('type_id')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

            {{-- Allergen --}}
            <div class="my-3">
                <h3>Allergens</h3>

                @foreach($allergens as $allergen)
                <span class="d-inline-block mr-3">
                    <input type="checkbox" name="allergens[]" id="allergen{{ $loop->iteration }}"
                        value="{{ $allergen->id }}" @if(in_array($allergen->id, old('allergens', []))) checked @endif>
                    <label for="allergen{{ $loop->iteration }}">
                        {{ $allergen->name }}
                    </label>
                </span>
                @endforeach
                @error('allergens')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            {{-- Cover --}}
            <div class="mb-3">
                <label class="form-label" for="cover">product image</label>
                <input type="file" class="form-control-file" name="cover" id="cover">
                @error('cover')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-success">Add a new product</button>
    </form>
    <div class="row">
        <a href="{{route('admin.products.index')}}" class="back-to mt-4">
            <i class="fas fa-arrow-left icon-back-to"></i>
            Back to Archive
        </a>
    </div>
</div>
@endsection