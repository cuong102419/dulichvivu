<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::select('id', 'title', 'slug', 'duration', 'code', 'departure_location')
            ->addSelect([
                'image_url' => DB::table('images')
                    ->selectRaw("CONCAT('" . url('/storage') . "/', image_url)")
                    ->whereColumn('tour_id', 'tours.id')
                    ->orderBy('id')
                    ->limit(1)
            ])
            ->addSelect([
                'price_adult' => DB::table('departures')
                    ->select('price_adult')
                    ->whereColumn('tour_id', 'tours.id')
                    ->whereDate('start_date', '>=', now()->toDateString())
                    ->orderBy('start_date', 'asc')
                    ->limit(1)
                    
            ])
            ->where('tours.area', '!=', 'international')
            ->where('tours.status', 'active')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công.',
            'data' => $tours
        ]);
    }
}
