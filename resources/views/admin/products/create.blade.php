@extends('layouts.admin.admin')
@section('admin')
    @include('admin.alert.alert')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <a href="{{route('admin.products.index')}}">
                    <h3 class="page-title">Products</h3>
                </a>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h4 class="box-title">Add Product</h4>
            </div>
            <div class="box-body">
                <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Brand">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control select2">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Title">Title</label>
                            <input type="text" name="Title" id="Title" class="form-control" value="{{old('Title')}}">
                            @error('Title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="SKU">SKU</label>
                            <input type="number" name="SKU" id="SKU" class="form-control" value="{{old('SKU')}}">
                            @error('SKU')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Price">Price</label>
                            <input type="number" name="Price" step="0.01" id="Price" min="0" class="form-control" value="{{old('Price')}}">
                            @error('Price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editor1">Details</label>
                        <textarea name="Details" id="editor1" class="form-control">{{old('Details')}}</textarea>
                        @error('Details')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
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
