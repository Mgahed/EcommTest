@extends('layouts.admin.admin')
@section('admin')
    @include('admin.alert.alert')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <a href="{{route('admin.brands.index')}}">
                    <h3 class="page-title">Brands</h3>
                </a>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h4 class="box-title">Add Brand</h4>
            </div>
            <div class="box-body">
                <form action="{{route('admin.brands.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </section>
@endsection
