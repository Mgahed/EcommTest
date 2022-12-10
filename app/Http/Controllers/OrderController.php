<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $carts = Cart::with('cartDetails.product')->where('user_id', auth()->user()->id)->get();
//        return $carts;
        $subtotal = 0;
        foreach ($carts as $cart) {
            foreach ($cart->cartDetails as $cartDetail) {
                $subtotal += $cartDetail->product->Price * $cartDetail->quantity;
            }
        }
        return view('front.checkout', compact('carts', 'subtotal'));
    }

    public function store(Request $request)
    {
        // create order and get id
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 0,
        ]);
        if ($order) {
            $carts = Cart::with('cartDetails.product')->where('user_id', auth()->user()->id)->get();
            foreach ($carts as $cart) {
                foreach ($cart->cartDetails as $cartDetail) {
                    OrderDetail::create([
                        'unit_price' => $cartDetail->product->Price,
                        'quantity' => $cartDetail->quantity,
                        'discount' => 0,
                        'order_id' => $order->id,
                        'product_id' => $cartDetail->product->id,
                    ]);
                }
            }
            Cart::where('user_id', auth()->user()->id)->delete();
            return redirect()->route('home')->with('success', 'Order placed successfully');
        }
        return redirect()->back()->with('error', 'Order placed failed');
    }

    public function orders()
    {
        $orders = Order::with('orderDetails.product')->where('user_id', auth()->user()->id)->paginate(20); // todo make latest
//        return $orders[0];
        return view('front.orders.orders', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::with('orderDetails.product')->where('user_id',auth()->user()->id)->findOrFail($id);
//        return $order;
        $subtotal = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $subtotal += $orderDetail->unit_price * $orderDetail->quantity;
        }
        return view('front.orders.details', compact('order', 'subtotal'));
    }
}
