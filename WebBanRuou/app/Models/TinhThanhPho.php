<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhThanhPho extends Model
{
    use HasFactory;
    protected $table = 'tbl_tinhthanhpho';
    protected $primaryKey = 'matp';
    public $timestamps = false;
    protected $fillable = ['tentinhthanhpho', 'type'];
}
