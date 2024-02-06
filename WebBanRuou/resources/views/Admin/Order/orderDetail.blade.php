@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="table-responsive">
                <div>
                    <h2 style="background-color: greenyellow">Thông tin người mua</h2>
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th>Tên người nhận</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sdt</th>
                                <th scope="col">Địa chỉ</th>
                                <th>Ghi chú</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr id="danhsach">
                                <td>{{ $nhanHang->ten }}</td>
                                <td>{{ $nhanHang->email }}</td>
                                <td>{{ $nhanHang->sdt }}</td>
                                <td>{{ $nhanHang->diachi }}</td>
                                <td>{{ $nhanHang->ghichu }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 50px">
                    <h2 style="background-color: greenyellow">Chi Tiết Đơn Hàng</h2>
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th style="text-align: center">Mã sản phẩm </th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="text-align: center">Tổng tiền</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ctDonHang as $item)
                                <tr id="danhsach">
                                    <td>{{ $item->masp }}</td>
                                    <td>{{ $item->soluong }}</td>
                                    <td>{{ $item->tongtien }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
