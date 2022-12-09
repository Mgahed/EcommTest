@extends('layouts.front.front')

@section('content')
<section class="py-5">
    <header>
        <div class="d-flex justify-content-between">
            <h2 class="h5 text-uppercase mb-4">Products</h2>
        </div>
    </header>
    <div class="row">
        @foreach($products as $product)
        <!-- PRODUCTS -->
        @include('front.products.includes.card', ['product' => $product])
        @endforeach
        <div class="text-center">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
