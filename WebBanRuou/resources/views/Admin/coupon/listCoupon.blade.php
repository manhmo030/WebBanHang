@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Danh Sách Phiếu Mua Hàng 🌻 </h6>
                <div class="d-flex align-items-center justify-content-between mb-4">


                    <a class="btn btn-sm btn-primary" href="{{ URL::to('/admin/add-coupon') }}">Thêm Mới</a>
                </div>

            </div>
            <div class="table-responsive">
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}

                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"></th>
                            <th scope="col">ID</th>
                            <th scope="col">Mã giảm giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hình thức giảm giá</th>
                            <th scope="col">Số tiền giảm giá</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Ghi chú</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($giamgia as $item)
                            <tr class="danhsach" data-coupon-id="{{ $item->giamgia_id }}">
                                <td><input class="form-check-input" type="checkbox" name="items[]"
                                        value="{{ $item->giamgia_id }}"></td>
                                <td>{{ $item->giamgia_id }}</td>
                                <td>{{ $item->magiamgia }}</td>
                                <td>{{ $item->soluong }}</td>
                                <td>{{ $item->hinhthucgiamgia }}</td>
                                <td>{{ $item->sotiengiamgia }}</td>
                                <td>{{ $item->ngayhethan }}</td>
                                <td>{{ $item->title }}</td>
                                <td><a class="btn btn-sm btn-primary"
                                        href="{{ URL::to('/admin/update-coupon/' . $item->giamgia_id) }}">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 10px">
                    {{ $giamgia->links() }}
                </div>
                <button style="margin-top: 10px; float: left" class="btn btn-sm btn-primary" id="delete-coupon">Xóa</button>

            </div>
        </div>
    </div>
    <script src="{{ asset('assetAdmin/js/ajax/coupon.js') }}"></script>
@endsection
