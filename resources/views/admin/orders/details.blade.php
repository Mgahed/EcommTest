@php
    // get all status keys from config
    $status = array_keys(config('global.ORDER.STATUS'));
@endphp
@extends('layouts.admin.admin')
@section('admin')
    @include('admin.alert.alert')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order Details</h3>
                <span class="badge badge-warning">{{config('global.ORDER.STATUS.'.$order->status)}}</span>
            </div>
            <div class="ml-auto">
                <div class="btn-group">
                    <button class="btn btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Change Status</button>
                    <div class="dropdown-menu">
                        @foreach($status as $key)
                            @if($key !== $order->status)
                                <a class="dropdown-item" href="{{route('admin.orders.update', [$order->id, $key])}}">
                                    {{config('global.ORDER.STATUS.'.$key)}}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table text-nowrap table-striped">
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
                                       href="{{route('admin.products.edit',$details->product->id)}}">
                                        <img src="https://placeimg.com/640/480/animals"
                                             alt="{{$details->product->Title}}" width="70"/>
                                    </a>
                                    <div class="ml-3"><strong class="h6">
                                            <a class="reset-anchor animsition-link"
                                               href="{{route('admin.products.edit',$details->product->id)}}">
                                                {{$details->product->Title}}
                                            </a>
                                        </strong></div>
                                </div>
                            </th>
                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">${{$details->unit_price}}</p>
                            </td>
                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">{{$details->quantity}}</p>
                            </td>
                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">
                                    ${{$details->unit_price * $details->quantity}}</p>
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
    @push('bottom-scripts')
        <script src="{{asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('dashboard/js/pages/editor.js')}}"></script>
        <script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
        <script src="{{asset('dashboard/js/pages/advanced-form-element.js')}}"></script>
    @endpush
@endsection
