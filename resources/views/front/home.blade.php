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
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                            <div class="badge text-white bg-"></div>
                            <a class="d-block" href="detail.html"><img class="img-fluid w-100"
                                                                       src="https://placeimg.com/40/30/nature"
                                                                       alt="{{$product->Title}}"></a>
                            <div class="product-overlay">
                                <ul class="mb-0 list-inline">
                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                                            href="#"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="list-inline-item m-0 p-0">
                                        <a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a>
                                    </li>
                                    <li class="list-inline-item me-0">
                                        <a class="btn btn-sm btn-outline-dark" href="#">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h6><a class="reset-anchor" href="detail.html">{{$product->Title}}</a></h6>
                        <p class="small text-muted">{{$product->Price}}</p>
                    </div>
                </div>
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
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                            <div class="badge text-white bg-"></div>
                            <a class="d-block" href="{{route('brands.details',$brand->id)}}"><img class="img-fluid w-100"
                                                                       src="https://placeimg.com/40/30"
                                                                       alt="{{$brand->name}}"></a>
                            <div class="product-overlay">
                                <ul class="mb-0 list-inline">
                                    <li class="list-inline-item me-0">
                                        <a class="btn btn-sm btn-outline-dark" href="#">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h6><a class="reset-anchor" href="{{route('brands.details',$brand->id)}}">{{$brand->name}}</a></h6>
                    </div>
                </div>
            @endforeach
            <div class="text-center">
                {{ $brands->appends(['products'=> $products->currentPage()])->links() }}
            </div>
        </div>
    </section>
@endsection
