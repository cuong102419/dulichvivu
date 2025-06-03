<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
        }
    }
}
