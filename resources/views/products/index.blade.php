@extends('layout')
@section('content')
@if(Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
@if(Session::has('delete'))
<p class="alert alert-danger">{{ Session::get('delete') }}</p>
@endif
<div class="row">
    <div class="col-12 d-flex justify-content-between">
        <h1 class="text-dark m-3">Products</h1>
        <p>
            <a class="btn btn-outline-success m-3" href="{{ route('products.create') }}">Create Product</a>
        </p>
        
    </div>
    <div class="col-4 mt-3">
        <form class="d-flex" action="{{ route('products.index') }}" method="GET">
            <input class="form-control me-2" type="text" name="search" placeholder="Search by Product ID or Description" value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>


        <table class="table table-success table-striped-columns text-center table-hover mt-3">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>
                    Actions
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                    <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" class="rounded-circle" style="width: 100px; height: 100px;">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a title="Show" class="btn btn-outline-primary" href="{{ route('products.show', $product->id) }}">Show</a> | 
                        <a title="Edit" class="btn btn-outline-success" href="{{ route('products.edit', $product->id) }}">Edit</a> | 
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button title="Delete" class="btn btn-outline-danger" type="submit">Delete</button>
            </form>
                    </td>
                </tr>
                
                @endforeach
                
            </tbody>
        </table>
        <div class="pagination">
            {{ $products->links() }}
        </div>


@endsection

        