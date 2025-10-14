<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        if (!Auth::attempt($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Email hoặc mật khẩu không chính xác.',
            ], 401);
        }

        $user = Auth::user();

        if ($user->is_active == 'no') {
            return response()->json([
                'status' => false,
                'message' => 'Tài khoản chưa được kích hoạt. Vui lòng kiểm tra email hoặc liên hệ quản trị viên.',
            ], 403);
        }

        if ($user->status == 'banned') {
            return response()->json([
                'status' => false,
                'message' => 'Tài khoản bị khóa. Vui lòng liên hệ quản trị viên.',
            ], 403);
        }

        return response()->json([
            'status' => true,
            'message' => 'Đăng nhập thành công.',
            'user' => $user,
            'token' => $user->createToken('react-token')->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công.'
        ]);
    }

    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    public function register(Request $request)
    {
        try {
            $data = $request->only(['email', 'password', 'name']);

            $user = User::create($data);
            Mail::to($user->email)->send(new VerifyAccount($user));

            return response()->json([
                'status' => true,
                'message' => 'Tạo tài khoản thành công, vui lòng kiểm tra email để kích hoạt.',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Tạo tài khoản không thành công.'
            ]);
        }
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        $exists = User::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }
}
