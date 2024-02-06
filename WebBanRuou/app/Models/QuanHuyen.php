<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    use HasFactory;
    protected $table = 'tbl_quanhuyen';
    protected $primaryKey = 'maqh';
    public $timestamps = false;
    protected $fillable = ['tenquanhuyen', 'type', 'matp'];
}
