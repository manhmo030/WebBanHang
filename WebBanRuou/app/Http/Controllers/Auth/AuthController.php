<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Admin;
use App\Models\GioHang;
use App\Models\PasswordResetTokens;
use App\Models\User;
use App\Rules\Captcha;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('Auth.loginAdmin');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('tendangnhap', 'password');
        $result = Auth::guard('admin')->attempt($credentials);

        if ($result) {
            $admin = Auth::guard('admin')->user();
            Session::put('hoten', $admin->hoten);
            Session::put('anh', $admin->anh);
            Session::put('maadmin', $admin->maadmin);
            return redirect('/admin/show-dash-board');
        } else {
            // Đăng nhập thất bại
            return redirect()
                ->back()->withErrors(['tendangnhap' => 'Invalid username or password']);
        }
    }

    public function logout()
    {
        Session::put('hoten', null);
        Session::put('anh', null);
        Session::put('maadmin', null);
        return view('Auth.loginAdmin');
    }

    public function showFormRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $admin = Admin::create([
            'tendangnhap' => $request->input('tendangnhap'),
            'password' => bcrypt($request->input('password')),
            'hoten' => $request->input('hoten')
        ]);
        return redirect('/admin/');
    }

    public function showFormLoginUser()
    {
        return view('Auth.loginUser');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $result = Auth::attempt($credentials);

        if ($result) {
            $a = Auth::user();
            Session::put('hoten', $a->name);
            Session::put('mauser', $a->makhachhang);
            return redirect('/user/');
        } else {
            // Đăng nhập thất bại
            return redirect()
                ->back()->withErrors(['tendangnhap' => 'Invalid username or password']);
        }
    }

    public function showFormRegisterUser()
    {
        return view('Auth.registerUser');
    }

    public function registerUser(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'name' => 'required|string',
            'g-recaptcha-response' => ['required', new Captcha()],

        ], [
            'g-recaptcha-response.required' => (new Captcha())->message(),
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,

        ]);
        //dd($user);
        $userId = $user->makhachhang;
        GioHang::create([
            'makhachhang' => $userId,
            'ngaytao' => Carbon::now()
        ]);

        return redirect('/user/login');
    }

    public function logoutUser()
    {
        Auth::logout();
        Session::put('hoten', null);
        Session::put('mauser', null);
        return redirect('/user/');
    }

    public function showFormForgotPassword()
    {
        return view('Auth.forgotPasswordUser');
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(50);
            $tokenData = [
                'email' => $request->email,
                'token' => $token
            ];

            if (PasswordResetTokens::create($tokenData)) {
                Mail::to($request->email)->send(new ForgotPassword($user, $token));
                return redirect()
                    ->back()->withErrors(['email' => 'Please check email']);
            }
        } else {
            return redirect()
                ->back()->withErrors(['email' => 'Undifine email']);
        }
    }

    public function showFormResetPassword($token)
    {
        $_token = $token;
        return view('Auth.resetPassword')->with('token', $_token);
    }

    public function resetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:3',
            'confirmpassword' => 'required|same:password'
        ]);
        $tokenData = PasswordResetTokens::where('token', $token)->firstOrFail();
        $user = $tokenData->user;

        $data = [
            'password' => bcrypt($request->password)
        ];
        $check = $user->update($data);
        PasswordResetTokens::destroy($tokenData->email);
        if ($check) {
            return redirect('/user/');
        }
        return redirect()
            ->back()->withErrors(['email' => 'Invalid username or password']);
    }
}
