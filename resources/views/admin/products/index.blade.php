@extends('layouts.admin.admin')
@section('admin')
    @include('admin.alert.alert')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Products</h3>
                <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-2">Add</a>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Title</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img src="https://placeimg.com/70/70/nature" alt="{{$product->Title}}"></td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->Title}}</td>
                                <td>{{$product->SKU}}</td>
                                <td>{{$product->Price}}</td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{route('admin.products.edit', $product->id)}}"
                                           class="btn btn-md btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.products.edit', $product->id)}}"
                                           class="btn btn-md btn-info mx-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{route('admin.products.delete', $product->id)}}"
                                           class="btn btn-md btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Title</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
