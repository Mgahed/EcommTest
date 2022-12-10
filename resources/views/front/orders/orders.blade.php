@extends('layouts.front.front')
@section('content')
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Orders</h2>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <!-- ORDERS TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table text-nowrap">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0 p-3" scope="col"><strong
                                    class="text-sm text-uppercase">Order Id</strong>
                            </th>
                            <th class="border-0 p-3" scope="col"><strong
                                    class="text-sm text-uppercase">Status</strong></th>
                            <th class="border-0 p-3" scope="col"><strong
                                    class="text-sm text-uppercase">Total</strong>
                            </th>
                            <th class="border-0 p-3" scope="col"><strong
                                    class="text-sm text-uppercase">Date</strong>
                            </th>
                            <th class="border-0 p-3" scope="col"><strong
                                    class="text-sm text-uppercase">
                                    Invoice
                                </strong>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="border-0">
                        @foreach($orders as $order)
                            <tr>
                                <th class="ps-0 py-3 border-light" scope="row">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 small">{{$order->id}}</p>
                                    </div>
                                </th>
                                <td class="p-3 align-middle border-light">
                                    <p class="mb-0 small">{{config('global.ORDER.STATUS.' . $order->status)}}</p>
                                </td>
                                <td class="p-3 align-middle border-light">
                                    @php($total = 0)
                                    @foreach($order->orderDetails as $details)
                                        @php($total += $details->quantity * $details->product->Price)
                                    @endforeach
                                    ${{$total}}
                                </td>
                                <td class="p-3 align-middle border-light">
                                    <p class="mb-0 small">
                                        {{$order->created_at->diffForHumans()}}
                                    </p>
                                </td>
                                <td class="p-3 align-middle border-light">
                                    <a class="btn btn-dark btn-sm"
                                       href="{{route('orders.details',$order->id)}}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
