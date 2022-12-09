<div class="col-lg-3 col-sm-6">
    <div class="product text-center skel-loader">
        <div class="d-block mb-3 position-relative"><a class="d-block" href="{{route('products.details',$product->id)}}"><img
                    class="img-fluid w-100" src="https://placeimg.com/640/480/animals" alt="{{$product->Title}}"></a>
            <div class="product-overlay">
                <ul class="mb-0 list-inline">
                    <li class="list-inline-item m-0 p-0">
                        <a class="btn btn-sm btn-dark" href="{{route('cart.add',$product->id)}}">Add to cart</a>
                    </li>
                    <li class="list-inline-item me-0">
                        <a class="btn btn-sm btn-outline-dark" href="{{route('products.details',$product->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <h6><a class="reset-anchor" href="{{route('products.details',$product->id)}}">{{$product->Title}}</a></h6>
        <p class="small text-muted">${{$product->Price}}</p>
    </div>
</div>
