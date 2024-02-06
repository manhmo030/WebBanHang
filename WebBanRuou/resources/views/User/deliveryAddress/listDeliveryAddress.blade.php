@extends('layoutUser.layoutUser')
@section('client_content')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                    </div>
                    <h4 class="col-lg-8 col-md-6">Địa chỉ nhận hàng</h4>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                    </div>
                    <div class="col-lg-8 col-md-6" style="text-align: center">
                        <h5><a href="{{ URL::to('/user/add-delivery-address') }}"><i
                                    class="fa-solid fa-circle-plus"></i>Thêm địa chỉ nhận hàng</a></h5>
                        <h4></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order">
                            @foreach ($address as $item)
                                <ul>
                                    <li>{{ $item->hoten }} - {{ $item->sdt }} <span><a
                                                href="{{ URL::to('/user/update-delivery-address/' . $item->mattnh) }}"
                                                style="padding: 5px">Sửa</a></span></li>
                                    <li>{{ $item->tentinhthanhpho }}, {{ $item->tenquanhuyen }},
                                        {{ $item->tenxaphuongthitran }}
                                        <span>
                                            @if ($item->trangthai == 'default')
                                                <a href="" style="color: red; border:solid 1px; padding: 5px;">
                                                    Mặcđịnh</a>
                                            @else
                                                <a href="{{ URL::to('/user/change-delivery-address/' . $item->mattnh) }}"
                                                    style="color: red; padding: 5px;">
                                                    Chọn</a>
                                            @endif
                                        </span>
                                    </li>

                                    <h4></h4>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
