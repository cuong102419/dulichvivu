<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FavoriteTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteTourController extends Controller
{
    public function index($userId)
    {
        $favorites = DB::table('favorite_tours')
            ->join('tours', 'favorite_tours.tour_id', '=', 'tours.id')
            ->leftJoin(DB::raw('(SELECT tour_id, MIN(image_url) AS image_url FROM images GROUP BY tour_id) AS img'), 'tours.id', '=', 'img.tour_id')
            ->select(
                'tours.id',
                'tours.title',
                'tours.slug',
                'tours.destination',
                DB::raw("CONCAT('" . url('/storage') . "/', img.image_url) as image_url")
            )
            ->where('favorite_tours.user_id', $userId)
            ->where('tours.status', 'active')
            ->latest('tours.id')
            ->paginate(4);

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công.',
            'data' => $favorites
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->only('user_id', 'tour_id');

        $favorite = FavoriteTour::where($data)->first();

        if ($favorite) {
            $favorite->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa thành công.'
            ]);
        }

        FavoriteTour::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm thành công.'
        ]);
    }
}
