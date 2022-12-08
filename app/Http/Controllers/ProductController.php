<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Cache;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function rules($id = null)
    {
        return [
            'Title' => 'required|string|max:255',
            'SKU' => 'required|string|max:255|unique:products,SKU,' . $id,
            'Details' => 'required',
            'Price' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ];
    }

    public function index()
    {
        if (!Cache::get('products')) {
            $products = Product::with('brand')->get();
            Cache::put('products', $products, 60 * 60 * 24); // 24 hours
        } else {
            $products = Cache::get('products');
        }
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        if (!Cache::get('brands-asc')) {
            $brands = Brand::orderBy('name', 'asc')->get();
            Cache::put('brands-asc', $brands, 60 * 60 * 24); // 24 hours
        } else {
            $brands = Cache::get('brands-asc');
        }
        return view('admin.products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        $product = Product::create([
            'Title' => $request->Title,
            'SKU' => $request->SKU,
            'Details' => $request->Details,
            'Price' => $request->Price,
            'brand_id' => $request->brand_id,
        ]);
        Cache::forget('products');
        Cache::forget('brands-asc');
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if (!Cache::get('brands-asc')) {
            $brands = Brand::orderBy('name', 'asc')->get();
            Cache::put('brands-asc', $brands, 60 * 60 * 24); // 24 hours
        } else {
            $brands = Cache::get('brands-asc');
        }
        return view('admin.products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->rules($id));
        $product = Product::findOrFail($id);
        $update = $product->update([
            'Title' => $request->Title,
            'SKU' => $request->SKU,
            'Details' => $request->Details,
            'Price' => $request->Price,
            'brand_id' => $request->brand_id,
        ]);
        if ($update) {
            Cache::forget('products');
            Cache::forget('brands-asc');
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        }
        return redirect()->back()->with('error', 'Product updated failed.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $delete = $product->delete();
        if ($delete) {
            Cache::forget('products');
            Cache::forget('brands-asc');
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        }
        return redirect()->back()->with('error', 'Product deleted failed.');
    }
}
