<div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="product text-center">
        <div class="position-relative mb-3">
            <div class="badge text-white bg-"></div>
            <a class="d-block" href="{{route('brands.details',$brand->id)}}">
                <img class="img-fluid w-100" src="https://placeimg.com/40/30" alt="{{$brand->name}}"></a>
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
