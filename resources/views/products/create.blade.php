@extends('layout')
@section('content')
<h1>Create Product</h1>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 card">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
            <label class="form-label" for="product_id">Product ID:</label>
            <input class="form-control" type="text" name="product_id" id="product_id" required>
            @error('product_id')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
            <label class="form-label" for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
            @error('name')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            <div>
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control" name="description" id="description"></textarea>
            @error('description')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
            <label class="form-label" for="price">Price:</label>
            <input class="form-control" type="text" name="price" id="price" required>
            @error('price')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <div>
            <label class="form-label" for="stock">Stock:</label>
            <input class="form-control" type="text" name="stock" id="stock">
            @error('stock')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>

            <div>
            <label class="form-label" for="image">Image:</label>
            <input class="form-control" type="file" name="image" id="image">
            @error('image')
                <font style="color: red">{{ $message }}</font>
            @enderror
            </div>
            
            <button class="btn btn-outline-success" type="submit">Create</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>


<a class="btn btn-outline-secondary" href="{{ route('products.index') }}">Back to Products</a>
@endsection
