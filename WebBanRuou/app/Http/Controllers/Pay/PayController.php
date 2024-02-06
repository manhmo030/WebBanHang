<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietGioHang;
use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\HoaDonBan;
use App\Models\NhanHang;
use App\Models\ThanhToan;
use App\Models\ThongTinNhanHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PayController extends Controller
{
    private $pay, $ttnh, $cart;

    public function __construct(ThanhToan $pay, ThongTinNhanHang $ttnh, GioHang $cart)
    {
        $this->pay = $pay;
        $this->ttnh=$ttnh;
        $this->cart=$cart;
    }

    public function showFormPurchase()
    {
        $makhachhang = auth()->user()->makhachhang;
        $cartdata = $this->cart->showCart($makhachhang);
        $address_default = $this->ttnh->thongtinnhanhangByUserId($makhachhang);
        return view('User.cart.purchase', compact('cartdata', 'address_default'));
    }

    public function purchase(Request $request)
    {
        $data = $request->all();
        $makhachhang = auth()->user()->makhachhang;
        $donhang = $this->pay->addDonHang($makhachhang);
        $madonhang = $donhang->madonhang;
        // $giohang = GioHang::where('makhachhang', $makhachhang)->first();  // cách1
        // $ctgiohang = $giohang->chiTietGioHangWithSanPham;
        $this->pay->addChiTietDonHang($makhachhang, $madonhang);
        $this->pay->addNhanHan($data, $madonhang);
        $this->pay->deleteChiTietGioHang($makhachhang);
        return redirect('user/waitingPurchase');
    }

    public function showFormWaitingPurchase()
    {
        return view('User.cart.waitingPurchase');
    }
}
