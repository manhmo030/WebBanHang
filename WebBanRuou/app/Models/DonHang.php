<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'tbl_donhang';
    protected $primaryKey = 'madonhang';
    public $timestamps = false;
    protected $fillable = ['magiohang', 'ngaydathang', 'tongtien', 'trangthai'];

    public function chiTietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'madonhang');
    }

    public function chiTietDonHangWithSanPham()
    {
        return $this->chiTietDonHang()
            ->join('tbl_sanpham', 'tbl_ctdonhang.masp', '=', 'tbl_sanpham.masp')
            ->select('tbl_ctdonhang.*', 'tbl_sanpham.*');
    }
}
