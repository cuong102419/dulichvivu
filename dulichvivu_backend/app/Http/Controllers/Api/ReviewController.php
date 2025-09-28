<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Image;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index($code)
    {
        $booking = Booking::where('code', $code)->with('review')->firstOrFail();

        if ($booking) {
            $tour = Tour::select('id', 'code', 'title', 'slug')->where('id', $booking->tour_id)->firstOrFail();
            $images = Image::where('tour_id', $tour->id)->get();
            $imageUrls = $images->map(function ($path) {
                return url('/storage/' . $path->image_url);
            });

            return response()->json([
                'status' => true,
                'message' => 'Lấy dữ liệu thành công',
                'data' => [
                    'tour' => $tour,
                    'image_url' => $imageUrls,
                    'booking' => $booking,
                    'reviewed' => $booking->review ? 1 : 0
                ]
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'booking_id',
            'tour_id',
            'user_id',
            'rating',
            'comment'
        ]);

        Review::create($data);

        $averageRating = Review::where('tour_id', $data['tour_id'])->avg('rating');

        Tour::where('id', $data['tour_id'])->update([
            'reviews' => number_format($averageRating, 1)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đánh giá thành công'
        ]);
    }

    public function list($tourId)
    {
        $reviews = Review::select('id', 'user_id', 'rating', 'comment')->where('tour_id', $tourId)
            ->with('user:id,name,avatar')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $reviews
        ]);
    }
}
