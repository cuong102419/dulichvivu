<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\MomoController;
use App\Http\Controllers\Payment\PaypalController;
use App\Models\Departure;
use App\Models\PendingBooking;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $code = $request->get('code');
        $date = $request->get('date');

        $tour = Tour::where('code', $code)->select('id', 'code', 'title', 'area')->firstOrFail();

        $minDate = $tour->area === 'international'
            ? Carbon::now()->addDays(30)->toDateString()
            : Carbon::now()->addDays(7)->toDateString();

        if ($date < $minDate) {
            return response()->json([
                'status' => false,
                'message' => "Ngày khởi hành không hợp lệ."
            ], 400);
        }

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

    public function pending(Request $request)
    {
        try {
            $tour = Tour::find($request->tour_id);
            $departures = Departure::find($request->departure_id);
            $totalPrice = ($departures->price_adult * $request->number_adults) + ($departures->price_child * $request->number_children);
            $linkRedirect = $request->link;

            $data = [
                'tour_id' => $tour->id,
                'departure_id' => $departures->id,
                'user_id' => $request->user_id,
                'start_date' => $departures->start_date,
                'end_date' => $departures->end_date,
                'number_adults' => $request->number_adults,
                'number_children' => $request->number_children,
                'price_adult' => $departures->price_adult,
                'price_child' => $departures->price_child,
                'total_price' => $totalPrice,
                'payment_method' => $request->payment_method,
                'note' => $request->note
            ];

            $pendingBooking = PendingBooking::create($data);
            $link = null;
            
            if ($pendingBooking->payment_method === 'momo') {
                $momo = new MomoController();
                $link = $momo->momo($pendingBooking->code, $pendingBooking->total_price, $pendingBooking->id, $linkRedirect);
            }

            if ($pendingBooking->payment_method === 'paypal') {
                $paypal = new PaypalController();
                $link = $paypal->createOrder($pendingBooking->total_price, $pendingBooking->code, $linkRedirect);
            }

            return response()->json([
                'status' => true,
                'message' => 'Thành công.',
                'data' => $data,
                'link' => $link
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Đã xảy ra lỗi trong quá trình xử lý.'
            ], 500);
        }
    }
}
