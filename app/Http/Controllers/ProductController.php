<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $sortField = $request->get('sortField', 'name');
    $sortDirection = $request->get('sortDirection', 'asc');
    $search = $request->get('search');

    $query = Product::query();

    if ($search) {
        $query->where('product_id', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    }

    $products = $query->orderBy($sortField, $sortDirection)->simplePaginate(2);

    return view('products.index', compact('products', 'sortField', 'sortDirection', 'search'));
}


    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|unique:products',
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:png,jpeg,jpg,gif,svg',
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        $destinationPath = public_path('images/');
        $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $productImage);
        $input['image'] = "$productImage";
    }

    Product::create($input);

    return redirect()->route('products.index')->with('message','Product Created Successfully.');
}

    


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }



public function update(Request $request, $id)
{
    $request->validate([
        'product_id' => 'required|unique:products,product_id,' . $id,
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    $product = Product::findOrFail($id);
    $input = $request->all();

    if ($image = $request->file('image')) {
        @unlink(public_path('images/'.$product->image));
        $destinationPath = public_path('images/');
        $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $productImage);
        $input['image'] = "$productImage";
    } else {
        unset($input['image']);
    }

    $product->update($input);

    return redirect()->route('products.index')->with('message','Product Updated successfully.');
}

    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('delete','Product Deleted Successfully.');
    }


}
