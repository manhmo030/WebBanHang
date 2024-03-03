<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetTokens extends Model
{
    use HasFactory;

    protected $table = 'password_reset_tokens';
    protected $primaryKey = 'id';
    protected $fillable = ['token', 'email'];
    public $timestamps = false;

    public function user(){
        return $this->hasOne(User::class, 'email', 'email');
    }
}
