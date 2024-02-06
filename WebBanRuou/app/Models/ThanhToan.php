<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    use HasFactory;
    protected $table = 'tbl_thanhtoan';
    protected $primaryKey = 'mathanhtoan';
    public $timestamps = false;
    protected $fillable = ['madonhang', 'ngaythanhtoan', 'tongtien', 'phuongthucthanhtoan'];

    public function addDonHang($makhachhang)
    {
        $cart = new GioHang();
        $magiohang = $cart->getMaGioHang($makhachhang);
        $tongtien = $cart->allTotal($makhachhang);
        $donhang = DonHang::create([
            'magiohang' => $magiohang,
            'ngaydathang' => Carbon::now(),
            'tongtien' => $tongtien,
            'trangthai' => 'Đang chờ xử lý'
        ]);
        return $donhang;
    }

    public function addChiTietDonHang($makhachhang, $madonhang)
    {
        $cart = new GioHang();
        $ctgh = $cart->getChiTietGioHang($makhachhang);  //cách 2
        foreach ($ctgh as $item) {
            ChiTietDonHang::create([
                'madonhang' => $madonhang,
                'masp' => $item->masp,
                'soluong' => $item->soluong,
                'tongtien' => $item->tongcong
            ]);
        }
        return $cart;
    }

    public function addNhanHan($data, $madonhang)
    {
        $nhanHang = NhanHang::create([
            'madonhang' => $madonhang,
            'ten' => $data['name'],
            'email' => $data['email'],
            'sdt' => $data['sdt'],
            'diachi' => $data['diachi'],
            'ghichu' => $data['ghichu']
        ]);
        return $nhanHang;
    }

    public function addThanhToan($makhachhang, $madonhang)
    {
        $thanhToan = self::create([
            'madonhang' => $madonhang,
            'ngaythanhtoan' => Carbon::now(),
            'tongtien' => $this->cart->allTotal($makhachhang),
            'phuongthucthanhtoan' => 'Thanh Toán Khi Nhận Hàng'
        ]);
        return $thanhToan;
    }

    public function deleteChiTietGioHang($makhachhang)
    {
        $cart = new GioHang();
        $magiohang = $cart->getMaGioHang($makhachhang);
        ChiTietGioHang::where('magiohang', $magiohang)->delete();
        return $cart;
    }
}
