<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'tbl_giohang';
    protected $primaryKey = 'magiohang';

    public $timestamps = false;
    protected $fillable = ['makhachhang', 'ngaytao'];

    public function chiTietGioHang()
    {
        return $this->hasMany(ChiTietGioHang::class, 'magiohang');
    }

    public function chiTietGioHangWithSanPham()
    {
        return $this->chiTietGioHang()
            ->join('tbl_sanpham', 'tbl_ctgiohang.masp', '=', 'tbl_sanpham.masp')
            ->select('tbl_ctgiohang.*', 'tbl_sanpham.tensp', 'tbl_sanpham.anh');
    }
    public function getChiTietGioHang($makhachhang)
    {
        $ctgh = GioHang::where('makhachhang', $makhachhang)
            ->join('tbl_ctgiohang', 'tbl_giohang.magiohang', '=', 'tbl_ctgiohang.magiohang')
            ->select('tbl_ctgiohang.*')->get();
        return $ctgh;
    }

    public function addCartItem($makhachhang, $data)
    {
        $cart = self::firstOrNew(['makhachhang' => $makhachhang]);
        $cartItem = ChiTietGioHang::where('magiohang', $cart->magiohang)
            ->where('tbl_ctgiohang.masp', $data['masp'])
            ->first();
        $product = SanPham::where('masp', $data['masp'])->first();
        $price = $product->dongiaban;
        if ($cartItem) {
            $cartItem->soluong += $data['quantity'];
            $cartItem->tongcong = $cartItem->soluong * $price;
            $cartItem->save();
        } else {
            ChiTietGioHang::create([
                'magiohang' => $cart->magiohang,
                'masp' => $data['masp'],
                'soluong' => $data['quantity'],
                'gia' => $price,
                'tongcong' => $data['quantity'] * $price
            ]);
        }
        return $cart;
    }

    public function allTotal($makhachhang)
    {
        $cart = self::where('makhachhang', $makhachhang)->first();
        $allTotal = 0;
        foreach ($cart->chiTietGioHangWithSanPham as $item) {
            $allTotal += $item->tongcong;
        }
        return $allTotal;
    }

    public function showCart($makhachhang)
    {
        $cart = self::where('makhachhang', $makhachhang)->first();
        $cartItems = $cart->chiTietGioHangWithSanPham;
        $allTotal = $this->allTotal($makhachhang);
        return ['cartItems' => $cartItems, 'cart' => $cart, 'allTotal' => $allTotal];
    }

    public function getMaGioHang($makhachhang)
    {
        $cart = self::where('makhachhang', $makhachhang)->first();
        $magiohang = $cart->magiohang;
        return $magiohang;
    }
}
