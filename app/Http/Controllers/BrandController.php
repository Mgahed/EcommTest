<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Cache;
use Illuminate\Http\Request;

class BrandController extends Controller
{
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
}
