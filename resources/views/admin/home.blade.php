@extends('layouts.app')

@section('content')
<div class="container">
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
                    <div class='d-flex justify-content-between'>
                        <p>Modify all the products contnet</p>
                        <a href="{{route('admin.products.index')}}" class="btn btn-primary">Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
