@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-success my-2" href="{{route('admin.products.create')}}">Create a new product</a>
    @if(session('message'))
    <div class="alert alert-success">
        <strong>{{session('message')}}</strong> was correctly deleted.
    </div>
    @endif
    <div class="card my-2">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <td scope="col">Name</td>
                        <td scope="col">Type</td>
                        <td scope="col">Price</td>
                        <td scope="col" colspan="3" class="text-center">Actions</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}€</td>
                        <td>
                            @if ($product->type)
                                {{ $product->type->name }}
                            @else
                                No type specified
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.products.show', $product->slug)}}" class="btn btn-success ms-5">See
                                more</a>
                        </td>
                        <td>
                            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">Edit product</a>
                        </td>
                        <td>
                            <form action="{{route('admin.products.destroy', $product->id)}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete
                                    product</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection