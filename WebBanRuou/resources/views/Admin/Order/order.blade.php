@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="table-responsive">
                <h1 style="background-color: greenyellow">Danh sách đơn hàng</h1>

                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th></th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tổng giá tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th style="text-align: center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donhang as $item)
                            <tr id="danhsach">
                                <td><input class="form-check-input" type="checkbox" name="selected_products[]" "></td>
                                    <td>{{ $item->madonhang }}</td>
                                    <td>{{ $item->tongtien }}</td>
                                    <td>{{ $item->trangthai }}</td>
                                    <td>{{ $item->ngaydathang }}</td>
                                    <td style="text-align: center">
                                        <form action="{{ URL::to('/admin/order/' . $item->madonhang) }}" method="POST">
                                            @csrf
                                            <button name="duyet" type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i></button>
                                            <button name="huy" type="submit" class="btn btn-sm btn-primary" style="background-color: red"><i class="fa-solid fa-xmark"></i></button>
                                        </form>
                                    </td>
                                    <td style="text-align: center"><a class="btn btn-sm btn-primary" href="{{ URL::to('/admin/orderDetail/' . $item->madonhang) }}">Xem</a></td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 10px">
                    {{ $donhang->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
