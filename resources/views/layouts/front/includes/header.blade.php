@php
    // get user sum of cart
    $cart = \App\Models\Cart::with('cartDetails')->where('user_id',Auth::user()->id)->get();
    // get sum of quantity in cartDetails
    $qtyCart = $cart->map(function($item){
        return $item->cartDetails->sum('quantity');
    })->sum();
@endphp
<header class="header bg-white">
    <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="{{route('home')}}"><span
                    class="fw-bold text-uppercase text-dark">{{env('APP_NAME')}}</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link {{\Request::route()->getName() == 'home' ? 'active' : ''}}"
                                       href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a
                            class="nav-link {{\Request::route()->getName() == 'products.index' || \Request::route()->getName() == 'products.details' ? 'active' : ''}}"
                            href="{{route('products.index')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a
                            class="nav-link {{\Request::route()->getName() == 'brands.index' || \Request::route()->getName() == 'brands.details' ? 'active' : ''}}"
                            href="{{route('brands.index')}}">Brands</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.html">
                            <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                class="text-gray fw-normal">({{$qtyCart}})</small>
                        </a>
                    </li>
                    {{--<li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small class="text-gray fw-normal"> (0)</small></a></li>--}}
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end end-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-md-end text-start" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>
