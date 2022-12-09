@extends('layouts.front.front')

@section('content')
    <!-- HERO SECTION-->
    @include('layouts.front.includes.hero')

    <section class="py-5">
        <header>
            <div class="d-flex justify-content-between">
                <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{route('home',['productFilter'=>'asc', 'brandFilter'=>$brandFilter])}}" class="btn btn-primary
                    {{$productFilter == 'asc' ? 'active' : ''}}">
                        <i class="fa fa-arrow-up"></i>
                    </a>
                    <a href="{{route('home',['productFilter'=>'desc', 'brandFilter'=>$brandFilter])}}" class="btn btn-primary
                    {{$productFilter == 'desc' ? 'active' : ''}}">
                        <i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
            <h2 class="h5 text-uppercase mb-4">Products</h2>
        </header>
        <div class="row">
            @foreach($products as $product)
                <!-- PRODUCT-->
                @include('front.products.includes.card', ['product' => $product])
            @endforeach
            <div class="text-center">
                {{$products->appends(['brands' => $brands->currentPage()])->links()}}
            </div>
        </div>

        <header>
            <div class="d-flex justify-content-between">
                <h2 class="h5 text-uppercase mb-4">Brands</h2>
                <div class="btn-group btn-group-sm mb-3" role="group" aria-label="Basic example">
                    <a href="{{route('home',['productFilter'=>$productFilter, 'brandFilter'=>'asc'])}}" class="btn btn-primary
                    {{$brandFilter == 'asc' ? 'active' : ''}}">
                        <i class="fa fa-arrow-up"></i></a>
                    <a href="{{route('home',['productFilter'=>$productFilter, 'brandFilter'=>'desc'])}}" class="btn btn-primary
                    {{$brandFilter == 'desc' ? 'active' : ''}}">
                        <i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
        </header>
        <div class="row">
            @foreach($brands as $brand)
                <!-- BRANDS -->
                @include('front.brands.includes.card', ['brand' => $brand])
            @endforeach
            <div class="text-center">
                {{ $brands->appends(['products'=> $products->currentPage()])->links() }}
            </div>
        </div>
    </section>
@endsection
