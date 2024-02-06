<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonBan extends Model
{
    use HasFactory;
    protected $table = 'tbl_chitiethdb';

    public $timestamps = false;
    protected $fillable = ['masp', 'sohdb', 'soluongban', 'giamgia', 'giaban'];
}
