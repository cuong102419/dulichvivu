<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departure;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $code = $request->get('code');
        $date = $request->get('date');

        $tour = Tour::where('code', $code)->select('id', 'code', 'title')->firstOrFail();

        $departure = Departure::where('tour_id', $tour->id)
            ->where('start_date', $date)
            ->select('id', 'start_date', 'end_date', 'departure_time', 'price_adult', 'price_child', 'capacity')
            ->firstOrFail();

        return response()->json([
            'status' => true,
            'message' => 'Thông tin chuyến đi',
            'data' => [
                'tour' => $tour,
                'departure' => $departure,
            ]
        ]);
    }
}
