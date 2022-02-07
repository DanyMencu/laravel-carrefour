@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-ccontent-center">
            <div class="col-10">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>name</th>
                            <th>price</th>
                            <th colspan="3">actions</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <a href="{{route('admin.products.show', $product->slug)}}">see more</a>
                                    <a href="{{route('admin.products.edit', $product->id)}}">edit product</a>
                                    <form action="{{route('admin.products.destroy', $post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" on-click="return confirm('Are you sure you want to delete?')">delete product</button>
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