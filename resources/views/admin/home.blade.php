@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Operations on:</h4>
                    <hr>
                    <div class='my-3 row'>
                        {{-- Product index route --}}
                        <a href="{{route('admin.products.index')}}" class="my-1">Show all products</a>

                        {{-- Product create route --}}
                        <a href="{{route('admin.products.create')}}" class="my-1">Add new product</a>

                        {{-- Type create route --}}
                        <a href="{{-- {{route('admin.types')}} --}}#" class="my-1">Show all types of products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
