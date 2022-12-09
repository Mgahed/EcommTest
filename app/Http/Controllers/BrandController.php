<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Cache;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
        ];
    }

    public function index()
    {
        if (!Cache::has('brands')) {
            $brands = Brand::all();
            Cache::put('brands', $brands, 60 * 60 * 24); // 24 hours
        } else {
            $brands = Cache::get('brands');
        }
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        $brand = Brand::create([
            'name' => $request->name,
        ]);
        if ($brand) {
            Cache::forget('brands');
            return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully');
        }
        return redirect()->back()->with('error', 'Brand created failed');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->rules());
        $brand = Brand::find($id);
        $update = $brand->update([
            'name' => $request->name,
        ]);
        if ($update) {
            Cache::forget('brands');
            return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully');
        }
        return redirect()->back()->with('error', 'Brand updated failed');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $delete = $brand->delete();
        if ($delete) {
            Cache::forget('brands');
            return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully');
        }
        return redirect()->back()->with('error', 'Brand deleted failed');
    }


    /*--- front ---*/

    public function brands()
    {
        $brands = Brand::paginate(20, ['*'], 'brands')->onEachSide(1);
        return view('front.brands.brands', compact('brands'));
    }

    public function details($id)
    {
        $brand = Brand::findOrFail($id);
        return view('front.brands.details', compact('brand'));
    }
}
