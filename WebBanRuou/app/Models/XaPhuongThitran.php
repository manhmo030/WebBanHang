<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XaPhuongThitran extends Model
{
    use HasFactory;
    protected $table = 'tbl_xaphuongthitran';
    protected $primaryKey = 'xaid';
    public $timestamps = false;
    protected $fillable = ['tenxaphuongthitran', 'type', 'phivanchuyen', 'maqh'];
}
