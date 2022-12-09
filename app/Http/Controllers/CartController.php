<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::with('cartDetails.product')->where('user_id', auth()->user()->id)->get();
//        return $carts;
        $subtotal = 0;
        foreach ($carts as $cart) {
            foreach ($cart->cartDetails as $cartDetail) {
                $subtotal += $cartDetail->product->Price * $cartDetail->quantity;
            }
        }
        return view('front.cart', compact('carts', 'subtotal'));
    }
    public function add($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $checkCart = Cart::where('user_id', auth()->user()->id)->get();
        $checkCartDetail = false;
        if ($checkCart) {
            $checkCartDetail = CartDetail::where('product_id', $id)->whereIn('cart_id', $checkCart->pluck('id'))->first();
        }
        if ($checkCartDetail) {
            $checkCartDetail->quantity += $request->quantity > 0 ? $request->quantity : 1;
            $cartDetails = $checkCartDetail->save();
        } else {
            $cart = Cart::create([
                'user_id' => $request->user()->id,
            ]);
            $cartDetails = CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'unit_price' => $product->Price,
                'quantity' => $request->quantity > 0 ? $request->quantity : 1,
                'discount' => 0,
            ]);
        }
        if ($cartDetails) {
            return redirect()->back()->with('success', 'Product added to cart successfully');
        }
        return redirect()->back()->with('error', 'Product added to cart failed');
    }

    public function remove($id)
    {
        $cart = Cart::findOrFail($id);
        $delete = $cart->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Product removed from cart successfully');
        }
        return redirect()->back()->with('error', 'Product removed from cart failed');
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $checkCart = Cart::where('user_id', auth()->user()->id)->get();
        $checkCartDetail = false;
        if ($checkCart) {
            $checkCartDetail = CartDetail::where('product_id', $id)->whereIn('cart_id', $checkCart->pluck('id'))->first();
        }
        if ($checkCartDetail) {
            $checkCartDetail->quantity = $request->quantity > 0 ? $request->quantity : 1;
            $cartDetails = $checkCartDetail->save();
        }
        if ($cartDetails) {
            return redirect()->back()->with('success', 'Product updated to cart successfully');
        }
        return redirect()->back()->with('error', 'Can not update product quantity');

    }
}
