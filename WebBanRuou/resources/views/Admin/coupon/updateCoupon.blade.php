@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <form action="{{ URL::to('/admin/update-coupon') }}" method="POST">
        {{ csrf_field() }}
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Sửa Phiếu Mua Hàng</h3>
                    <input type="hidden" name="giamgia_id" value="{{ $giamgia_item->giamgia_id }}">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="magiamgia" value="{{ $giamgia_item->magiamgia }}">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Mã giảm giá</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="soluong" value="{{ $giamgia_item->soluong }}">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Số lượng</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Floating label select example" name="hinhthucgiamgia">
                            <option value="percentage"
                                {{ $giamgia_item->hinhthucgiamgia == 'percentage' ? 'selected' : '' }}>
                                Phần trăm</option>
                            <option value="amount" {{ $giamgia_item->hinhthucgiamgia == 'amount' ? 'selected' : '' }}>
                                Số tiền cố định</option>
                        </select>
                        <span class="error" id="maloai_error"></span>
                        <label for="floatingSelect">Hình thức giảm giá</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="sotiengiamgia"
                            value="{{ $giamgia_item->sotiengiamgia }}">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Số tiền giảm giá</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="ngayhethan" value="{{ $giamgia_item->ngayhethan }}">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Ngày hết hạn</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" value="{{ $giamgia_item->title }}">
                        <label for="floatingInput">Ghi chú</label>
                        <span class="error" id="dongianhap_error"></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <button type="submit" class="btn btn-primary ms-2" name="luu">Lưu</button>
                    </div>

                </div>

            </div>
        </div>
    </form>
@endsection
