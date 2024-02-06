<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    use HasFactory;

    protected $table = 'tbl_hdb';
    protected $primaryKey = 'sohdb';
    public $timestamps = false;
    protected $fillable = ['makhachhang', 'diachi', 'sdt', 'ngayban', 'tongtien'];

    public function addHoaDonBan($makhachhang, $data)
    {
        $giohang = new GioHang();
        $allTotal = $giohang->allTotal($makhachhang);
        $hdb = HoaDonBan::create([
            'makhachhang' => $makhachhang,
            'diachi' => $data['diachi'],
            'sdt' => $data['sdt'],
            'ngayban' => Carbon::now(),
            'tongtien' => $allTotal
        ]);
        $hdb_id = $hdb->sohdb;
        $cart = GioHang::where('makhachhang', $makhachhang)->first();
        $ctgiohang = $cart->chiTietGioHangWithSanPham;

        foreach ($ctgiohang as $item) {
            ChiTietHoaDonBan::create([
                'masp' => $item->masp,
                'sohdb' => $hdb_id,
                'soluongban' => $item->soluong,
                'giaban' => $item->tongcong
            ]);
        }
        $cart->chiTietGioHangWithSanPham()->delete();
        return $hdb;
    }
}
