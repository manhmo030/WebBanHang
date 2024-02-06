<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\GioHang;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $cart;
    public function __construct(GioHang $cart)
    {
        $this->cart = $cart;
    }

    public function showFormOrder()
    {
        $makhachhang = auth()->user()->makhachhang;
        $magiohang = $this->cart->getMaGioHang($makhachhang);
        $order = DonHang::where('magiohang', $magiohang)
            ->orderBy('ngaydathang', 'DESC')
            ->with('chiTietDonHangWithSanPham')->get();
        if ($order->isNotEmpty()) {
            return view('User.cart.order', compact('order'));
        } else {
            $errorMessage = 'Chưa có đơn hàng nào';
            return view('User.cart.order', compact('order', 'errorMessage'));
        }
    }
}
