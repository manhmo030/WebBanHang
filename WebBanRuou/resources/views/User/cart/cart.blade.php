@extends('layoutUser.layoutUser')
@section('client_content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assetClient/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">

            @if (isset($errorMessage))
                <div style="text-align: center" class="alert alert-danger">
                    {{ $errorMessage }}
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cartData['cartItems'] as $item)
                                        <tr class="product">
                                            <td class="shoping__cart__item">
                                                <img width="100px" height="100px" src="{{ asset('images/' . $item->anh) }}"
                                                    alt="">
                                                <h5>{{ $item->tensp }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                ${{ $item->gia }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty" data-cartdetail-id="{{ $item->mactgiohang }}">
                                                        <input type="text" id="quantity-{{ $item->mactgiohang }}"
                                                            value="{{ $item->soluong }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td id="total-{{ $item->mactgiohang }}" class="shoping__cart__total">
                                                ${{ $item->tongcong }}
                                            </td>
                                            <td> {{-- Xóa --}}
                                                <a class="delete-to-cart" data-cartdetail-id="{{ $item->mactgiohang }}"
                                                    href="#"><i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ URL::to('/user/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <a href="#" class="update-to-cart primary-btn cart-btn cart-btn-right"><span
                                    class="icon_loading"></span>
                                Upadate Cart</a>
                        </div>
                    </div>
                    <div class="col-lg-6">{{-- để đây để giữ vị trí --}}</div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span id="subTotal">${{ $cartData['allTotal'] }}</span></li>
                            </ul>
                            <a href="{{ URL::to('/user/purchase') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    <script src="{{ asset('assetClient/js/ajax.js') }}"></script>
@endsection
