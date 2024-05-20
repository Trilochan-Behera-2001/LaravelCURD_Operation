@extends('Layouts.app')

@section('main')
    <h2>Edit page</h2>
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <Strong>{{ $message}}</Strong>
          </div>
      @endif
      <div class="container mt-2">
        <div class="row">
            <div class="col-sm justify-content-center">
                <form action="/product/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
                    {{-- <form action="{{route('product.update',['product'=>$id])}}" method="POST" enctype="multipart/form-data"> --}}
                    {{-- <h3>Edit Product #{{ $product->id }}</h3> --}}
                    @csrf
                    @method('put')
                    <div class="mb-3 mt-3">
                      <label for="name" class="form-label">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{old('name',$product->name)}}">
                      @if ($errors->has('name'))
                        <span class="text-danger"> {{ $errors->first('name')}}</span>                          
                      @endif
                    </div>
                    <div class="mb-3">
                        <label for="description">Description:</label>
                        <textarea class="form-control" rows="5" id="description" placeholder="Enter Description" name="description" value="{{old('description',$product->description)}}"></textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger"> {{ $errors->first('description')}}</span>                          
                      @endif
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Image:</label>
                      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" value="{{old('image',$product->image)}}">
                      @if ($errors->has('image'))
                        <span class="text-danger"> {{ $errors->first('image')}}</span>                          
                      @endif
                    </div>
                    <div class="form-check mb-3">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
      </div>
@endsection