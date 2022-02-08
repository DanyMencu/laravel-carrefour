@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-success my-2" href="{{route('admin.products.create')}}">Create a new product</a>
    @if(session('message'))
    <div class="alert alert-success">
        <strong>{{session('message')}}</strong> was correctly deleted.
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>name</th>
                        <th>price</th>
                        <th colspan="3" class="text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}€</td>
                        <td class='d-flex justify-content-between'>
                            <a href="{{route('admin.products.show', $product->slug)}}" class="btn btn-success">see
                                more</a>
                            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">edit
                                product</a>
                            <form action="{{route('admin.products.destroy', $product->id)}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?')">delete
                                    product</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection