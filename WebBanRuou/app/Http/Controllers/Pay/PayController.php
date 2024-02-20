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
        $this->ttnh = $ttnh;
        $this->cart = $cart;
    }

    public function showFormPurchase()
    {
        $makhachhang = auth()->user()->makhachhang;
        $cartdata = $this->cart->showCart($makhachhang);
        $address_default = ThongTinNhanHang::where('makhachhang', $makhachhang)
            ->where('trangthai', 'default')
            ->join('tbl_xaphuongthitran', 'tbl_xaphuongthitran.xaid', '=', 'tbl_thongtinnhanhang.xaid')
            ->join('tbl_quanhuyen', 'tbl_quanhuyen.maqh', '=', 'tbl_xaphuongthitran.maqh')
            ->join('tbl_tinhthanhpho', 'tbl_tinhthanhpho.matp', '=', 'tbl_quanhuyen.matp')
            ->select('tbl_thongtinnhanhang.*', 'tbl_xaphuongthitran.*', 'tbl_quanhuyen.*', 'tbl_tinhthanhpho.*')
            ->first();
        return view('User.cart.purchase', compact('cartdata', 'address_default'));
    }

    public function purchase(Request $request)
    {
        $total = $request->total;
        $mattnh = $request->checkAddress;
        $makhachhang = auth()->user()->makhachhang;
        $donhang = $this->pay->addDonHang($makhachhang, $mattnh);
        $madonhang = $donhang->madonhang;
        $this->pay->addChiTietDonHang($makhachhang, $madonhang);
        $this->pay->addThanhToan($madonhang, $total);
        $this->pay->deleteChiTietGioHang($makhachhang);

        return redirect('user/waitingPurchase');
    }

    public function showFormWaitingPurchase()
    {
        return view('User.cart.waitingPurchase');
    }
}
