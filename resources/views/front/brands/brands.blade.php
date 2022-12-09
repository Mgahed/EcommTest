@extends('layouts.front.front')

@section('content')
    <section class="py-5">
        <header>
            <div class="d-flex justify-content-between">
                <h2 class="h5 text-uppercase mb-4">Brands</h2>
            </div>
        </header>
        <div class="row">
            @foreach($brands as $brand)
                <!-- BRANDS -->
                @include('front.brands.includes.card', ['brand' => $brand])
            @endforeach
            <div class="text-center">
                {{ $brands->links() }}
            </div>
        </div>
    </section>
@endsection
