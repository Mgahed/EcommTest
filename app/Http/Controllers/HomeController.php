<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $productFilter = 'asc';
        $brandFilter = 'asc';

        if ($request->has('productFilter')) {
            \Session::remove('productFilter');
            $productFilter = $request->get('productFilter');
        }
        if ($request->has('brandFilter')) {
            \Session::remove('brandFilter');
            $brandFilter = $request->get('brandFilter');
        }

        if (\Session::has('brandFilter')) {
            $brandFilter = \Session::get('brandFilter');
        } else {
            \Session::put('brandFilter', $brandFilter);
        }
        if (\Session::has('productFilter')) {
            $productFilter = \Session::get('productFilter');
        } else {
            \Session::put('productFilter', $productFilter);
        }

        $products = Product::orderBy('id', $productFilter)->paginate(20, ['*'], 'products')->onEachSide(1);
        $brands = Brand::orderBy('id', $brandFilter)->paginate(8, ['*'], 'brands')->onEachSide(1);
        return view('front.home', compact('products', 'brands', 'productFilter', 'brandFilter'));
    }

    public function admin()
    {
        return view('admin.index');
    }
}
