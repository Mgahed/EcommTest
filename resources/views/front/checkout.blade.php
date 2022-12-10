@extends('layouts.front.front')
@section('content')

    <section class="py-5">
        <!-- BILLING ADDRESS-->
        <h2 class="h5 text-uppercase mb-4">Billing details</h2>
        @if($subtotal)
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('checkout.store')}}" method="post">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="firstName">Full name </label>
                            <input class="form-control form-control-lg" type="text" id="firstName"
                                   placeholder="Enter your first name" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                            <input class="form-control form-control-lg" type="email" id="email"
                                   placeholder="e.g. Jason@example.com" value="{{Auth::user()->email}}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                            <input class="form-control form-control-lg" type="tel" id="phone"
                                   placeholder="e.g. +02 245354745" value="{{Auth::user()->phone}}" readonly>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="country">Country</label>
                            <select class="form-control country" id="country" readonly
                                    data-customclass="form-control form-control-lg rounded-0">
                                <option value>Choose your country</option>
                                <option value="ksa">Saudi Arabia</option>
                                <option value="egypt" selected>Egypt</option>
                                <option value="uae">UAE</option>
                                <option value="usa">USA</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label text-sm text-uppercase" for="address">Address line</label>
                            <input class="form-control form-control-lg" readonly type="text" id="address"
                                   placeholder="House number and street name">
                        </div>

                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Place order</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Your order</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach($carts as $cart)
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small fw-bold">
                                        {{$cart->cartDetails[0]->product->Title}}
                                    </strong>
                                    <span class="text-muted small">${{$cart->cartDetails[0]->product->Price * $cart->cartDetails[0]->quantity}}</span>
                                </li>
                                <li class="border-bottom my-2"></li>
                            @endforeach
                            <li class="d-flex align-items-center justify-content-between"><strong
                                    class="text-uppercase small fw-bold">Total</strong><span>${{$subtotal}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <h4>No Items in Cart</h4>
                            <a class="btn btn-link p-0 text-dark btn-sm" href="{{url()->previous()}}">
                                <i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

@endsection
