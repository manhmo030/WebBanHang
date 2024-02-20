@extends('layoutAdmin.layoutAdmin')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Danh Sách Phí Vận Chuyển 🌻 </h6>

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
                            <th style="text-align: center">STT</th>
                            <th scope="col">Tỉnh, thành phố</th>
                            <th scope="col">Quận, huyện</th>
                            <th scope="col">Xã, phường, thị trấn</th>
                            <th scope="col">Phí ship</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($xaphuongthitran as $item)
                            <tr class="danhsach">
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td style="text-align: center">@php
                                    echo $i;
                                    $i++;
                                @endphp</td>
                                <td>{{ $item->tentinhthanhpho }}</td>
                                <td>{{ $item->tenquanhuyen }}</td>
                                <td>{{ $item->tenxaphuongthitran }}</td>
                                <td contenteditable class="editable" data-feeship-id="{{ $item->xaid }}">{{ $item->phivanchuyen }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 10px">
                    {{ $xaphuongthitran->links() }}
                </div>
                <button style="margin-top: 10px; float: left" class="btn btn-sm btn-primary" id="delete-coupon">Xóa</button>

            </div>
        </div>
    </div>
    <script src="{{ asset('assetAdmin/js/ajax/feeship.js') }}"></script>
@endsection
