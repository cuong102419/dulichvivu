<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $data = $request->only(['name', 'address', 'phone_number']);

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $path = $file->store('avatars', 'public');
                $data['avatar'] = $path;
            }

            $user->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công.',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Cập nhật thất bại. Vui lòng thử lại.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
