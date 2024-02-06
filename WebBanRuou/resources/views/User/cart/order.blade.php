@extends('layoutUser.layoutUser')
@section('client_content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assetClient/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Order</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Order</span>
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
            <form action="{{ URL::to('/user/update-cart') }}" method="POST">

                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT </th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (isset($errorMessage))
                                        <div style="text-align: center" class="alert alert-danger">
                                            {{ $errorMessage }}
                                        </div>
                                    @endif

                                    @foreach ($order as $index => $item)
                                        @php $rowspan = count($item->chiTietDonHangWithSanPham); @endphp
                                        <tr>
                                            <td rowspan="{{ $rowspan }}" style="border: 1px solid">{{ $index + 1 }}
                                            </td>
                                            <td class="shoping__cart__item" style="border: 1px solid">
                                                <img width="100px" height="100px"
                                                    src="{{ asset('images/' . $item->chiTietDonHangWithSanPham[0]->anh) }}"
                                                    alt="">
                                                <h5>{{ $item->chiTietDonHangWithSanPham[0]->tensp }}</h5>
                                            </td>
                                            <td class="shoping__cart__price" style="border: 1px solid">
                                                ${{ $item->chiTietDonHangWithSanPham[0]->dongiaban }}
                                            </td>
                                            <td style="border: 1px solid">
                                                x{{ $item->chiTietDonHangWithSanPham[0]->soluong }}
                                            </td>
                                            <td rowspan="{{ $rowspan }}" class="shoping__cart__total"
                                                style="border: 1px solid">
                                                ${{ $item->tongtien }}
                                            </td>
                                            <td rowspan="{{ $rowspan }}" style="border: 1px solid">
                                                {{ $item->trangthai }}
                                            </td>
                                        </tr>
                                        @for ($i = 1; $i < $rowspan; $i++)
                                            <tr>
                                                <td class="shoping__cart__item" style="border: 1px solid">
                                                    <img width="100px" height="100px"
                                                        src="{{ asset('images/' . $item->chiTietDonHangWithSanPham[$i]->anh) }}"
                                                        alt="">
                                                    <h5>{{ $item->chiTietDonHangWithSanPham[$i]->tensp }}</h5>
                                                </td>
                                                <td class="shoping__cart__price" style="border: 1px solid">
                                                    ${{ $item->chiTietDonHangWithSanPham[$i]->dongiaban }}
                                                </td>
                                                <td style="border: 1px solid">
                                                    x{{ $item->chiTietDonHangWithSanPham[$i]->soluong }}
                                                </td>

                                                <!-- Trong các hàng phụ, không cần hiển thị $index + 1 và trangthai -->
                                            </tr>
                                        @endfor
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            {{-- <p style="float: right">ALl Total = {{ $cartData['allTotal'] }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ URL::to('/user/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>


                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
