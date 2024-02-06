@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Danh Sách Sản Phẩm 🌻 </h6>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <!-- TÌM KIẾM -->
                    <form method="post" action="{{ URL::to('/admin/search-keyword') }}">
                        @csrf
                        <div class="d-none d-md-flex ms-4 search-container" style="margin-right: 10px">
                            <input name="keyword" type="text" id="search-input" placeholder="Theo mã, tên hàng...">
                            <button type="submit" class="btn btn-sm btn-primary">Tìm</button>
                        </div>
                    </form>

                    <a class="btn btn-sm btn-primary" href="{{ URL::to('/admin/add-product') }}">Thêm Mới</a>
                </div>

            </div>
            <div class="table-responsive">
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}
                <form action="{{ route('delete-multiple-products') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Mã loại</th>
                                <th scope="col">Mã chất liệu</th>
                                <th scope="col">Mã NCC</th>
                                <th scope="col">Đơn giá nhập</th>
                                <th scope="col">Đơn giá bán</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allProduct as $product)
                                <tr id="danhsach">
                                    <td><input class="form-check-input" type="checkbox" name="selected_products[]"
                                            value="{{ $product->masp }}"></td>
                                    <td>{{ $product->masp }}</td>
                                    <td>{{ $product->tensp }}</td>
                                    <td>{{ $product->maloai }}</td>
                                    <td>{{ $product->machatlieu }}</td>
                                    <td>{{ $product->mancc }}</td>
                                    <td>{{ $product->dongianhap }}</td>
                                    <td>{{ $product->dongiaban }}</td>
                                    <td>{{ $product->chiTietSanPham->soluong }}</td>
                                    <td><img style="width: 30px; height:40px " src="{{ asset('images/' . $product->anh) }}"
                                            alt=""></td>
                                    <td>{{ $product->ghichu }}</td>
                                    <td><a class="btn btn-sm btn-primary"
                                            href="{{ route('update-product', ['masp' => $product->masp]) }}">Sửa</a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{ $product->masp }}"
                                            action="{{ route('delete-product', ['masp' => $product->masp]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a class="btn btn-sm btn-primary" href="#"
                                            onclick="confirmDelete('{{ $product->masp }}')">Xóa</a>
                                    </td>
                                    <script>
                                        function confirmDelete(masp) {
                                            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                                                document.getElementById('delete-form-' + masp).submit();
                                            }
                                        }
                                    </script>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="margin-top: 10px">
                        {{ $allProduct->links() }}
                    </div>
                    <button type="submit" style="margin-top: 10px; float: left" class="btn btn-sm btn-primary"
                        id="delete-button">Xóa</button>
                </form>
            </div>
        </div>
    </div>
@endsection

