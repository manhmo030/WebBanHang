@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <form action="{{ URL::to('/admin/add-coupon') }}" method="POST">
        @csrf
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="bg-light rounded h-100 p-4">

                    <h3 class="mb-4">Thêm Phiếu Mua Hàng</h3>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="magiamgia">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Mã giảm giá</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="soluong">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Số lượng</label>
                    </div>

                    <div class="form-floating mb-4">
                        <select name="hinhthucgiamgia" select class="form-select" id="">
                            <option></option>
                            <option value="percentage">Phần trăm</option>
                            <option value="amount">Số tiền cố định</option>
                        </select>
                        <label for="floatingInput">Hình thức giảm giá</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="sotiengiamgia">
                        <span class="error" id="tensp_error"></span>
                        <label for="floatingInput">Số tiền giảm giá</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="date" class="form-control" name="ngayhethan" >
                        <span class="error" id="dongianhap_error"></span>
                        <label for="floatingInput">Ngày hết hạn</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="title">
                        <span class="error" id="dongiaban_error"></span>
                        <label for="floatingInput">Ghi chú</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <button type="submit" class="btn btn-primary ms-2" name="luu">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
