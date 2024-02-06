<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanHang extends Model
{
    use HasFactory;
    protected $table = 'tbl_nhanhang';
    protected $primaryKey = 'manhanhang';
    public $timestamps = false;
    protected $fillable = ['madonhang', 'ten', 'email', 'sdt', 'diachi', 'ghichu'];
}
