@extends('layouts.app')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <p>Name : <b>{{ $product->name }}</b></p>
                <p>Desription : <b>{{ $product->description }}</b></p>
                <img src="/products/{{ $product->image }}" class = "rounded" height="200" width="200" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
