<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->paginate(9);
        return view('user.list', compact('users'));
    }

    public function status(Request $request, User $user) {
        if($request->input('action') == 'active') {
            $user->is_active = 'yes';
            $user->save();

            alert('Thành công', 'Tài khoản đã được kích hoạt.', 'success');
            return redirect()->back();
        }

        if($request->input('action') == 'ban') {
            $user->status = 'banned';
            $user->save();

            alert('Thành công', 'Tài khoản đã vô hiệu hóa.', 'success');
            return redirect()->back();
        }

        if($request->input('action') == 'unban') {
            $user->status = null;
            $user->save();

            alert('Thành công', 'Tài khoản đã hoạt động.', 'success');
            return redirect()->back();
        }

        if($request->input('action') == 'delete') {
            $user->delete();

            alert('Thành công', 'Xóa tài khoản thành công.', 'success');
            return redirect()->back();
        }
    }

    public function verify($email)
    {
        $user = User::where('email', $email)->firstOrFail();
        if ($user->is_active == 'no') {
            $user->update([
                'is_active' => 'yes'
            ]);

            return redirect()->away('http://localhost:3000/login?verified=true');
        } else {
            return null;
        }

    }
}
