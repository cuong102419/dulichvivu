<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);

        return view('profile.index', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        try {
            $data = $request->all();

            if ($admin->avatar) {
                Storage::delete($admin->avatar);
            }

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');

                $path = $file->store('images/avatars');

                $data['avatar'] = $path;
            }

            $admin->update($data);

            alert('Thành công', 'Cập nhật tài khoản thành công.', 'success');

            return redirect()->back();
        } catch (\Throwable $th) {
            alert('Thất bại', 'Cập nhật tài khoản không thành công.', 'error');

            return redirect()->back();
        }
    }
}
