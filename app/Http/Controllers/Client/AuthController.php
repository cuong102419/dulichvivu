<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('client.auth.login');
    }

    public function checkLogin(Request $request) {
        $data = $request->validate([
            'email_login' => ['required', 'email'],
            'password_login' => ['required', 'min:6']
        ], [
            'email_login.email' => 'Email không hợp lệ',
        ]);

        $credentials = [
            'email' => $data['email_login'],
            'password' => $data['password_login']
        ];

        if(Auth::attempt($credentials)) {
            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'route' => route('home')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Email hoặc mật khẩu không chính xác'
            ]);
        }
    }

    public function signup() {
        return view('client.auth.signup');
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name_register' => ['required', 'min:4'],
            'email_register' => ['required', 'email', 'unique:users,email'],
            'pass_register' => ['required', 'min:6']
        ], [
            'email_register.unique' => 'Email đã tồn tại',
        ]);
        
        User::create([
            'name' => $data['name_register'],
            'email' => $data['email_register'],
            'password' => $data['pass_register'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công. Vui lòng đăng nhập để tiếp tục.',
            'route' => route('login')
        ]);
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Đăng xuất thành công');
        } else {
            return redirect()->route('login')->with('error', 'Bạn chưa đăng nhập');
        }
    }

}
