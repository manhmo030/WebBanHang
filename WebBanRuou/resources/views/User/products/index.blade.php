@extends('layoutUser.layoutUser')
@section('client_content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"><a href="{{ URL::to('/user/') }}">All</a></li>
                            @foreach ($productType as $item)
                                <li><a
                                        href="{{ route('product-type', ['maloai' => $item->maloai]) }}">{{ $item->tenloai }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter" id="MixItUp27B6C0">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset('images/' . $product->anh) }}"
                                style="background-image: url(&quot;img/featured/feature-1.jpg&quot;);">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ URL::to('/user/product-detail/' . $product->masp) }}"><i
                                                class="fa-solid fa-circle-info"></i></a></li>
                                    <li><a href="#" class="add-to-cart" data-product-id="{{ $product->masp }}">
                                            <i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a>{{ $product->tensp }}</a>
                                </h6>
                                <h5>{{ $product->dongiaban }}</h5>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
            <div style="margin-top: 5px; " class="pagination-container">
                {{ $products->links() }}
            </div>
        </div>
    </section>

    <script src="{{ asset('assetClient/js/ajax.js') }}"></script>
@endsection
