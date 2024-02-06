@extends('layoutUser.layoutUser')
@section('client_content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assetClient/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @php
        $subtotal = $cartdata['allTotal'];
        $total = $cartdata['allTotal'];
        $coupon = 0;
        $transportFee = 0;
    @endphp
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">

                <div class="shoping__continue" style="margin-bottom: 50px">

                    <div class="shoping__discount">
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <h4>Discount Codes</h4>
                            </div>
                        </div>
                        <form action="{{ URL::to('/user/check-coupon') }}" method="POST" style="text-align: center">
                            @csrf
                            <input name="coupon" type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                            <div class="row">
                                <div class="col-lg-2 col-md-6">
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    @if (session('message'))
                                        <div class="alert alert-success" style="margin-top:10px">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <h4>Billing Details</h4>
                    </div>
                </div>
                <form action="{{ URL::to('/user/purchasee') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Delivery address <span><a
                                            href="{{ URL::to('/user/delivery-address') }}"
                                            class="site-btn">Change</a></span></div>
                                @if (session('address_notDefault'))
                                    @php
                                        $address_notDefault = session('address_notDefault');
                                    @endphp
                                    <input type="hidden" name="checkAddress" value="{{ $address_notDefault->mattnh }}">
                                    <ul>
                                        <li>{{ $address_notDefault->hoten }} - {{ $address_notDefault->sdt }}</li>
                                        <li>{{ $address_notDefault->tentinhthanhpho }},
                                            {{ $address_notDefault->tenquanhuyen }},
                                            {{ $address_notDefault->tenxaphuongthitran }}</li>
                                    </ul>
                                @elseif (!is_null($address_default))
                                    <input type="hidden" name="checkAddress" value="{{ $address_default->mattnh }}">
                                    <ul>
                                        <li>{{ $address_default->hoten }} - {{ $address_default->sdt }}</li>
                                        <li>{{ $address_default->tentinhthanhpho }},
                                            {{ $address_default->tenquanhuyen }},
                                            {{ $address_default->tenxaphuongthitran }}</li>
                                    </ul>
                                @else
                                    <input type="hidden" name="checkAddress" value="chuaNhapTtnh">
                                    <ul>
                                        <li>Chưa có thông tin nhận hàng</li>
                                    </ul>
                                @endif

                                <h4></h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>

                                <ul>
                                    @foreach ($cartdata['cartItems'] as $item)
                                        <li>{{ $item->tensp }} - x{{ $item->soluong }}
                                            <span>{{ $item->tongcong }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__total">SubTotal <span>${{ $cartdata['allTotal'] }}</span>
                                </div>
                                @if (session('couponn'))
                                    @php
                                        $a = session('couponn');
                                    @endphp
                                    @if ($a->hinhthucgiamgia == 'amount')
                                        @php
                                            $coupon = $a->sotiengiamgia;
                                        @endphp
                                        <div class="checkout__order__total">Coupon <span> - ${{ $a->sotiengiamgia }}</span>
                                        </div>
                                    @else
                                        @php
                                            $coupon = ($subtotal * $a->sotiengiamgia) / 100;
                                        @endphp
                                        <div class="checkout__order__total">Coupon <span> - %{{ $a->sotiengiamgia }}</span>
                                        </div>
                                    @endif
                                @endif
                                @if (session('address_notDefault'))
                                    @php
                                        $transportFee = $address_notDefault->phivanchuyen;
                                    @endphp
                                    <div class="checkout__order__total">Transport Fee
                                        <span>+ ${{ $address_notDefault->phivanchuyen }}</span>
                                    </div>
                                @elseif(!is_null($address_default))
                                    @php
                                        $transportFee = $address_default->phivanchuyen;
                                    @endphp
                                    <div class="checkout__order__total">Transport Fee
                                        <span>+ ${{ $address_default->phivanchuyen }}</span>
                                    </div>
                                @endif

                                <div class="checkout__order__total">Total
                                    <span>
                                        ${{ $total = $subtotal - $coupon + $transportFee }}
                                    </span>
                                </div>

                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
