<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $destinations = Tour::select('area', DB::raw('count(*) as total'))
            ->groupBy('area')
            ->get();

        $total = $destinations->sum('total');

        $destinations = $destinations->map(function ($item) use ($total) {
            $item->area = match ($item->area) {
                'northern'      => 'Miền Bắc',
                'central'       => 'Miền Trung',
                'southern'      => 'Miền Nam',
                'international' => 'Nước ngoài',
                default         => $item->area,
            };
            $item->percentage = $total > 0 ? round(($item->total / $total) * 100, 2) : 0;
            return $item;
        });

        $paymentMethods = Booking::select('payment_method', DB::raw('count(*) as total'))
            ->groupBy('payment_method')
            ->get()
            ->map(function ($item) {
                $item->payment_method = match ($item->payment_method) {
                    'paypal'        => 'Paypal',
                    'momo'          => 'Momo',
                    'office'      => 'Tại văn phòng',
                    default         => $item->payment_method,
                };
                return $item;
            });

        $topTours = Tour::withSum('departures', 'booked')
            ->withSum('departures', 'capacity')
            ->orderByDesc('departures_sum_booked')
            ->limit(5)
            ->get(['id', 'code', 'title']);

        $newBookings = Booking::orderByDesc('id')
            ->limit(3)
            ->get()
            ->map(function ($item) {
                $item->status = match ($item->status) {
                    'pending'   => 'Chờ xác nhận',
                    'confirmed' => 'Đã xác nhận',
                    'canceled'  => 'Đã hủy',
                    'completed' => 'Hoàn thành',
                    default     => $item->status,
                };
                return $item;
            })  ;

        // dd($newBookings);

        return view('dashboard.index', compact('destinations', 'paymentMethods', 'topTours', 'newBookings'));
    }
}
