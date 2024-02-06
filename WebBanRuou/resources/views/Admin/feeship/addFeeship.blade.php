@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <form action="{{ URL::to('/admin/addFeeship') }}" method="POST">
        @csrf
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Thêm Phí Vận Chuyển</h3>
                    <div class="form-floating mb-4">
                        <select id="province" name="province" onchange="getDistricts()" class="form-select">
                            <option></option>
                            @foreach ($tinhthanhpho as $item)
                                <option value="{{ $item->matp }}">{{ $item->tentinhthanhpho }}</option>
                            @endforeach
                        </select>
                        <label for="floatingInput">Tỉnh, thành phố</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select id="district" name="district" onchange="getWards()" class="form-select">
                            <option></option>
                            <!-- Quận/Huyện options sẽ được thêm bằng JavaScript -->
                        </select>
                        <label for="floatingInput">Quận, huyện</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select id="ward" name="ward" class="form-select">
                            <option></option>
                            <!-- Phường/Xã options sẽ được thêm bằng JavaScript -->
                        </select>
                        <label for="floatingInput">Xã, phường, thị trấn</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input name="feeship" type="text" class="form-control">
                        <label for="floatingInput">Phí vận chuyển</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <button type="submit" class="btn btn-primary ms-2" name="luu">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('assetAdmin/js/ajax/feeship.js') }}"></script>
@endsection
