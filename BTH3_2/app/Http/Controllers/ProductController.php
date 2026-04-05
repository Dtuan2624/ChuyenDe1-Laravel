<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // search
        if($request->keyword){
            $query->where('name','like','%'.$request->keyword.'%');
        }

        // sort
        if($request->sort){
            $query->orderBy('price',$request->sort);
        }

        $products = $query->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('products','public');
        }

        Product::create($data);

        return redirect()->back()->with('success','Thêm thành công');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('products','public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success','Cập nhật thành công');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
