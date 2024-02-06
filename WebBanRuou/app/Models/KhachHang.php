<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class KhachHang extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    use HasFactory;

    protected $table = 'tbl_khachhang';

    public $timestamps = false;
    protected $fillable = ['tendangnhap', 'password', 'sdt', 'diachi', 'giotinh', 'tenkhachhang', 'tuoi'];
}
