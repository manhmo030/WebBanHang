<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'tbl_sanpham';
    protected $primaryKey = 'masp';

    public $timestamps = false;
    protected $fillable = ['tensp', 'maloai', 'mancc', 'machatlieu', 'dongianhap', 'dongiaban', 'anh', 'ghichu'];

    public function chiTietSanPham()
    {
        return $this->hasOne(ChiTietSanPham::class, 'masp', 'masp');
    }

    public function loaiSanPham()
    {
        return $this->hasOne(LoaiSanPham::class, 'maloai', 'maloai');
    }

    public function ncc()
    {
        return $this->hasOne(Ncc::class, 'mancc', 'mancc');
    }

    public function chatLieu()
    {
        return $this->hasOne(ChatLieu::class, 'machatlieu', 'machatlieu');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sanPham) {
            // Xóa chi tiết sản phẩm liên quan
            $sanPham->chiTietSanPham()->delete();
        });
    }
}
