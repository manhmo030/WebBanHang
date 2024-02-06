@extends('layoutUser.layoutUser')
@section('client_content')
    <section class="featured spad">
        <div style="background-color: #ff4500; " class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="color: #fff;">Đang chờ xử lý</h2>
                    </div>
                    <div style="text-align: center; margin: 20px">
                        <a href="{{ URL::to('/user/') }}" style="color: #fff;" class="hover-button">Trang chủ</a>
                        <a href="{{ URL::to('/user/order') }}" style="color: #fff;" class="hover-button">Đơn mua</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
