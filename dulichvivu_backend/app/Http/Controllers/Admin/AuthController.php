<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($data)) {
            alert('Thành công', 'Đăng nhập thành công.', 'success');
            return redirect()->route('dashboard');
        } else {
            alert('Thất bại', 'Email hoặc mật khẩu không chính xác.', 'error');
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

        alert('Thành công', 'Đăng xuất thành công.', 'success');
        return redirect()->route('login');

    }
}
