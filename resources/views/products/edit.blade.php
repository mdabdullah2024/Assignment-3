@extends('layout')
@section('content')
<h1>Edit Product</h1>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 card">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="form-label" for="product_id">Product ID:</label>
                <input class="form-control" type="text" name="product_id" id="product_id" value="{{ $product->product_id }}" required>
                @error('product_id')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
                <label class="form-label"  for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}" required>
            @error('name')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
                <label class="form-label" for="description">Description:</label>
            <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
            @error('description')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
                <label class="form-label" for="price">Price:</label>
            <input class="form-control" type="text" name="price" id="price" value="{{ $product->price }}" required>
            @error('price')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
                <label class="form-label" for="stock">Stock:</label>
            <input class="form-control" type="text" name="stock" id="stock" value="{{ $product->stock }}">
            @error('stock')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
                <label class="form-label" for="image">Image:</label>
            <input class="form-control" type="file" name="image" id="image" value="{{ $product->image }}">

            <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" class="rounded" style="width: 100px; height: 100px;">

            @error('image')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            
            <button class="btn btn-outline-primary" type="submit">Update</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>

<a class="btn btn-outline-secondary" href="{{ route('products.index') }}">Back to Products</a>
@endsection