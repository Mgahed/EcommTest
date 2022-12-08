@extends('layouts.admin.admin')
@section('admin')
    @include('admin.alert.alert')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Brands</h3>
                <a href="{{route('admin.brands.create')}}" class="btn btn-primary mb-2">Add</a>
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td><img src="https://placeimg.com/70/70/tech" alt="test"></td>
                                <td>{{$brand->name}}</td>
                                <td>
                                    <a href="{{route('admin.brands.edit', $brand->id)}}" class="btn btn-md btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{route('admin.brands.delete', $brand->id)}}" class="btn btn-md btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
