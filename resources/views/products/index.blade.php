@extends('Layouts.app')

@section('main')
      <div class="container mt-3">
        <div>
        <a href="{{ route('product.create')}}" class="btn btn-sm btn-info "> Add New Product</a>
        </div>
        <h1>Products</h1>
        <table class="table table-hover mt-3">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td><a href="/product/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
                <td>{{$product->description}}</td>
                <td>
                   <img src="products/{{$product->image}}" alt="" class="rounded-circle" width="50px" height="50px"> 
                </td>
                <td><a href="/product/{{ $product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                <a href="/product/{{ $product->id}}/delete" class="btn btn-sm btn-danger">delete</a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
@endsection