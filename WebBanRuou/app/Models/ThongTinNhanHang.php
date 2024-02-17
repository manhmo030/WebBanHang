<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinNhanHang extends Model
{
    use HasFactory;
    protected $table = 'tbl_thongtinnhanhang';
    protected $primaryKey = 'mattnh';
    public $timestamps = false;
    protected $fillable = ['hoten', 'sdt', 'email', 'xaid', 'makhachhang', 'trangthai'];

    public function thongtinnhanhangById($mattnh)
    {
        $ttnh = ThongTinNhanHang::where('mattnh', $mattnh)
            ->join('tbl_xaphuongthitran', 'tbl_xaphuongthitran.xaid', '=', 'tbl_thongtinnhanhang.xaid')
            ->join('tbl_quanhuyen', 'tbl_quanhuyen.maqh', '=', 'tbl_xaphuongthitran.maqh')
            ->join('tbl_tinhthanhpho', 'tbl_tinhthanhpho.matp', '=', 'tbl_quanhuyen.matp')
            ->select('tbl_thongtinnhanhang.*', 'tbl_xaphuongthitran.*', 'tbl_quanhuyen.*', 'tbl_tinhthanhpho.*')
            ->first();
        return $ttnh;
    }

    public function thongtinnhanhangByUserId($makhachhang)
    {
        $ttnh = ThongTinNhanHang::where('makhachhang', $makhachhang)
            ->where('trangthai', 'default')
            ->join('tbl_xaphuongthitran', 'tbl_xaphuongthitran.xaid', '=', 'tbl_thongtinnhanhang.xaid')
            ->join('tbl_quanhuyen', 'tbl_quanhuyen.maqh', '=', 'tbl_xaphuongthitran.maqh')
            ->join('tbl_tinhthanhpho', 'tbl_tinhthanhpho.matp', '=', 'tbl_quanhuyen.matp')
            ->select('tbl_thongtinnhanhang.*', 'tbl_xaphuongthitran.*', 'tbl_quanhuyen.*', 'tbl_tinhthanhpho.*')
            ->get();
        return $ttnh;
    }
}
