<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Kiểm tra xem người dùng đã tồn tại trong hệ thống chưa
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Người dùng chưa tồn tại, bạn có thể đăng ký nếu muốn
            $user = new User();
            $user->name = $googleUser->getName();
            $user->email = $googleUser->getEmail();
            $user->google_id = $googleUser->getId(); // Lưu Google ID vào cột google_id
            $user->password = bcrypt(Str::random(8));
            $user->save();
        }

        // Đăng nhập người dùng
        auth()->login($user);
        $a = Auth::user();
        Session::put('hoten', $a->name);
        // Chuyển hướng người dùng sau khi đăng nhập
        return redirect('/user/');
    }
}
