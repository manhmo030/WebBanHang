<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiamGia extends Model
{
    use HasFactory;

    protected $table = 'tbl_giamgia';
    protected $primarykey = 'giamgia_id';
    public $timestamps = false;
    protected $fillable = ['magiamgia', 'soluong', 'hinhthucgiamgia', 'sotiengiamgia', 'ngayhethan', 'title'];

}
