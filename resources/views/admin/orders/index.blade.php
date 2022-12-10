@extends('layouts.admin.admin')
@section('admin')
    @include('admin.alert.alert')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Orders</h3>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{config('global.ORDER.STATUS.'.$order->status)}}</td>
                                <td>{{$order->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{route('admin.orders.details', $order->id)}}"
                                           class="btn btn-md btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                    {{--{!! $dataTable->table() !!}--}}
                </div>
            </div>
        </div>
    </section>
@endsection
{{--@push('bottom-scripts')
    {!! $dataTable->scripts() !!}
@endpush--}}
