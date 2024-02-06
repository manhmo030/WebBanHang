<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietGioHang extends Model
{
    use HasFactory;

    protected $table = 'tbl_ctgiohang';
    protected $primaryKey = 'mactgiohang';

    public $timestamps = false;
    protected $fillable = ['magiohang', 'masp', 'soluong', 'gia', 'tongcong'];
}
