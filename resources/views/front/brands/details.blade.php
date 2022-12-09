@extends('layouts.front.front')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <!-- BRAND SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                            <div class="swiper product-slider-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://placeimg.com/640/480/animals" alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://placeimg.com/640/480/nature" alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://placeimg.com/640/480/tech" alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="https://placeimg.com/640/480/nature" alt="..."></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 order-1 order-sm-2">
                            <div class="swiper product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="https://placeimg.com/640/480/animals" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="https://placeimg.com/640/480/animals" alt="..."></a></div>
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="https://placeimg.com/640/480/nature" data-gallery="gallery2" data-glightbox="Product item 2"><img class="img-fluid" src="https://placeimg.com/640/480/nature" alt="..."></a></div>
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="https://placeimg.com/640/480/tech" data-gallery="gallery2" data-glightbox="Product item 3"><img class="img-fluid" src="https://placeimg.com/640/480/tech" alt="..."></a></div>
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="https://placeimg.com/640/480/nature" data-gallery="gallery2" data-glightbox="Product item 4"><img class="img-fluid" src="https://placeimg.com/640/480/nature" alt="..."></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BRAND DETAILS-->
                <div class="col-lg-6">
                    <ul class="list-inline mb-2 text-sm">
                        <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                        <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h1>{{$brand->name}}</h1>
                </div>
            </div>
            <!-- DETAILS TABS-->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">About</a></li>
            </ul>
            <div class="tab-content mb-5" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="p-4 p-lg-5 bg-white">
                        <h6 class="text-uppercase">About {{$brand->name}}</h6>
                        <p class="text-muted text-sm mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
