@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <form action="{{ URL::to('/admin/add-product') }}" method="POST">
        {{ csrf_field() }}
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="bg-light rounded h-100 p-4">

                    <h3 class="mb-4">Thêm Sản Phẩm</h3>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="tensp">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Tên Sản Phẩm</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="dungtich">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Dung tích</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Floating label select example" name="maloai">
                            @foreach ($loaisanphamList as $item)
                                <option value="{{ $item->maloai }}">{{ $item->tenloai }}</option>
                            @endforeach

                        </select>
                        <span class="error" id="maloai_error"></span>
                        <label for="floatingSelect">Loại Sản Phẩm</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Floating label select example" name="machatlieu">
                            @foreach ($chatlieuList as $item)
                                <option value="{{ $item->machatlieu }}">{{ $item->tenchatlieu }}</option>
                            @endforeach

                        </select>
                        <span class="error" id="machatlieu_error"></span>
                        <label for="floatingSelect">Chất Liệu</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Floating label select example" name="mancc">
                            @foreach ($nccList as $item)
                                <option value="{{ $item->mancc }}">{{ $item->tenncc }}</option>
                            @endforeach

                        </select>
                        <span class="error" id="mancc_error"></span>
                        <label for="floatingSelect">Nhà Cung Cấp</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="baoquan">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Bảo quản</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="huongvi">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Hương vị</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="dongianhap" value="0">
                        <label for="floatingInput">Giá Nhập</label>
                        <span class="error" id="dongianhap_error"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="dongiaban" value="0">
                        <label for="floatingInput">Giá Bán</label>
                        <span class="error" id="dongiaban_error"></span>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="soluong" value="0">
                        <label for="floatingInput">Số Lượng</label>
                        <span class="error" id="soluong_error"></span>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-lg" type="file" name="anh">
                        <label for="floatingInput">Hình Ảnh</label>
                    </div>

                    <div class="form-floating mb-4">
                        <textarea id="ckeditor1" class="form-control" style="height: 150px;" name="ghichu"></textarea>
                        <label for="floatingTextarea">Ghi Chú</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <button type="submit" class="btn btn-primary ms-2" name="luu">Lưu</button>
                    </div>

                </div>

            </div>
        </div>
    </form>
@endsection
