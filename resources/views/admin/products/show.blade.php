@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">     
        <h1 class="my-4">{{$product->name}}</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            {{$product->description}}
        </div>
        <div class="col-12 col-lg-6">
            image here
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

    @if(!$product->allergens->isEmpty())
        <h3 class="mt-3">Allergie:</h3>
        @foreach($product->allergens as $allergen)
            <span class="badge badge-primary">{{ $allergen->name }}</span>
        @endforeach    
    @else
        <p>no allergie per questp prodotto</p>
    @endif

    <div class="row">
        <a href="{{route('admin.products.index')}}" class="back-to mt-4">
        <i class="fas fa-arrow-left icon-back-to"></i>
        Back to Archive
        </a>
    </div>
</div>
@endsection