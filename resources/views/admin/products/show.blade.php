@extends('layouts.app')

@section('content')
<div class="container bg-white p-3">
    @if(session('message'))
    <div class="alert alert-success opacity-an">
        <span>{{session('message')}}</span>
    </div>
    @endif
    <div class="row">
        <h1 class="my-4">{{$product->name}}
            @if ($product->category_id === 2)
                <img src="https://cdn-icons-png.flaticon.com/128/4669/4669912.png" alt="Frozen" class="frozen-icon">
            @endif
        </h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="description mb-3">
                {{$product->description}}
            </div>
            <div class="price">
                Price: {{$product->price}}€
            </div>
        </div>
        <div class="col-12 col-lg-5 ms-lg-5">
            <h5 class="mb-0">Image: </h5>
            @if($product->cover)
            <img class="img-fluid" src="{{ asset('storage/' . $product->cover) }}" alt="{{ $product->name }}">
            @else
            <img class="img-fluid" src="https://webartdevelopers.com/blog/wp-content/uploads/2018/09/404-SVG-Animated-Page-Concept.png" alt="{{ $product->name }}">
            @endif
        </div>
    </div>

    <div class="row">
        {{-- types --}}
        <div class="col-3 mb-3">
            <h3 class="mt-3">Type:</h3>
            @if(!$product->type)
            <strong class="badge badge-primary p-1">No type</strong>
            @else
                <span class="mb-3">
                    
                    <strong class="badge badge-primary p-1">{{ $product->Type->name }}</strong>
                </span>
            @endif
        </div>

        <div class="col-3">
            {{-- Allergens --}}
            @if(!$product->allergens->isEmpty())
            <h3 class="mt-3">Allergeni:</h3>
            @foreach($product->allergens as $allergen)
            <span class="badge badge-success p-1">{{ $allergen->name }}</span>
            @endforeach
            @else
            <p class="mt-3">Non ci sono allergeni per questo prodotto</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary mt-4 me-3">
                <a href="{{route('admin.products.create')}}" class="cta-create">Create new product</a>
            </button>
            <button type="button" class="btn btn-warning mt-4">
                <a href="{{route('admin.products.edit', $product->id)}}" class="cta-edit">Edit {{$product->name}}</a>
            </button>
        </div>
    </div>

    <div class="row">
        <a href="{{route('admin.products.index')}}" class="back-to mt-4">
            <i class="fas fa-arrow-left icon-back-to"></i>
            Back to Archive
        </a>
    </div>
</div>
@endsection