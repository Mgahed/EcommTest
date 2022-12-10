@extends('layouts.front.front')
@section('content')
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Invoice</h2>
        <div class="col-lg-12 mb-4 mb-lg-0">
            <!-- CART TABLE-->
            <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                    <thead class="bg-light">
                    <tr>
                        <th class="border-0 p-3" scope="col"><strong
                                class="text-sm text-uppercase">Product</strong>
                        </th>
                        <th class="border-0 p-3" scope="col"><strong
                                class="text-sm text-uppercase">Price</strong>
                        </th>
                        <th class="border-0 p-3" scope="col"><strong
                                class="text-sm text-uppercase">Quantity</strong></th>
                        <th class="border-0 p-3" scope="col"><strong
                                class="text-sm text-uppercase">Total</strong>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="border-0">
                    @foreach($order->orderDetails as $details)
                        <tr>
                            <th class="ps-0 py-3 border-light" scope="row">
                                <div class="d-flex align-items-center">
                                    <a class="reset-anchor d-block animsition-link"
                                       href="{{route('products.details',$details->product->id)}}">
                                        <img src="https://placeimg.com/640/480/animals"
                                             alt="{{$details->product->Title}}" width="70"/>
                                    </a>
                                    <div class="ms-3"><strong class="h6">
                                            <a class="reset-anchor animsition-link"
                                               href="{{route('products.details',$details->product->id)}}">
                                                {{$details->product->Title}}
                                            </a>
                                        </strong></div>
                                </div>
                            </th>
                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">${{$details->product->Price}}</p>
                            </td>
                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">{{$details->quantity}}</p>
                            </td>
                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">
                                    ${{$details->product->Price * $details->quantity}}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th class="border-0 p-3" scope="col" colspan="3">
                            <strong class="text-sm text-uppercase">Total</strong>
                        </th>
                        <td class="p-3 align-middle border-light">
                            <p class="mb-0 small">
                                ${{$subtotal}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
