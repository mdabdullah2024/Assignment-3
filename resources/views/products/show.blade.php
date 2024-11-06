@extends('layout')
@section('content')
<div class="row">
    <div class="col-12 ml-3">
        <a class="btn btn-outline-secondary m-2" href="{{ route('products.index') }}">Back to Products</a>
    </div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 card">
        <h1>{{ $product->name }}</h1>
        <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        <p>

<img src="/images/{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%; height: 420px">

        </p>
    </div>
    <div class="col-2"></div>
</div>



@endsection