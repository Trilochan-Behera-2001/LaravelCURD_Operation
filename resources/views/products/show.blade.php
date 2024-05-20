@extends('Layouts.app')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-4">
                <p>Name::<b>{{$product->name}}</b></p>
                <p>Description::<b>{{$product->description}}</b></p>
                <img src="/products/{{$product->image}}" class="rounder-circle" width="100px" height="100px" alt="">
        </div>
    </div>
</div>
@endsection