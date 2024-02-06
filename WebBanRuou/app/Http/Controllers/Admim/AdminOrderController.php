<?php

namespace App\Http\Controllers\Admim;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\NhanHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminOrderController extends Controller
{
    public function showFormOrder()
    {
        $donhang = DonHang::orderBy('ngaydathang', 'DESC')->paginate(4);
        return view('Admin.Order.order', compact('donhang'));
    }

    public function updateOrder(Request $request, $madonhang)
    {
        if ($request->has('duyet')) {
            DonHang::where('madonhang', $madonhang)->update(['trangthai' => 'Đang Vận Chuyển']);
        } else {
            DonHang::where('madonhang', $madonhang)->update(['trangthai' => 'Đơn hàng bị hủy']);
        }
        return redirect('/admin/order');
    }

    public function showFormOrderDetail($madonhang)
    {
        $nhanHang = NhanHang::where('madonhang', $madonhang)->first();
        $ctDonHang = ChiTietDonHang::where('madonhang', $madonhang)->get();
        return view('Admin.Order.orderDetail', compact('nhanHang', 'ctDonHang'));
    }
}
