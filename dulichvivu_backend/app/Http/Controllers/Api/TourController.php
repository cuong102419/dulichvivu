<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 9);
        $area = $request->input('area');

        $toursQuery = Tour::select('id', 'code', 'slug', 'title', 'type', 'duration', 'area', 'departure_location')
            ->where('status', 'active')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('images')
                    ->whereColumn('images.tour_id', 'tours.id');
            })
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('departures')
                    ->whereColumn('departures.tour_id', 'tours.id')
                    ->where('status', 'open')
                    ->where('departures.start_date', '>=', now()->addDays(15)->toDateString());
            })
            ->orderByDesc('id');

        if ($area == 'trong-nuoc') {
            $toursQuery->where('area', '!=', 'international');
        } elseif ($area == 'nuoc-ngoai') {
            $toursQuery->where('area', '=', 'international');
        }

        $tours = $toursQuery->paginate($perPage);

        $tours->getCollection()->transform(function ($tour) {
            $image = DB::table('images')
                ->where('tour_id', $tour->id)
                ->orderBy('id')
                ->limit(1)
                ->value('image_url');

            $tour->image_url = $image ? url('/storage/' . $image) : null;

            $departure = DB::table('departures')
                ->where('tour_id', $tour->id)
                ->where('start_date', '>=', now()->addDays(7)->toDateString())
                ->where('status', 'open')
                ->orderBy('start_date', 'asc')
                ->limit(1)
                ->first(['start_date', 'price_adult']);

            if ($departure) {
                $tour->start_date = Carbon::parse($departure->start_date)->format('d-m-Y');
                $tour->price_adult = $departure->price_adult;
            } else {
                $tour->start_date = null;
                $tour->price_adult = null;
            }

            return $tour;
        });


        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công.',
            'data' => $tours
        ]);
    }

    public function detail($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        $images = DB::table('images')
            ->where('tour_id', $tour->id)
            ->pluck('image_url');

        $imageUrls = $images->map(function ($path) {
            return url('/storage/' . $path);
        });

        $start_date = $tour->area == 'international' ? now()->addDays(30)->toDateString() : now()->addDays(7)->toDateString();

        $timelines = DB::table('timeline')
            ->where('tour_id', $tour->id)
            ->orderBy('id', 'asc')
            ->get(['id', 'title', 'description']);

        $departures = DB::table('departures')
            ->where('tour_id', $tour->id)
            ->where('capacity', '>', 0)
            ->where('start_date', '>=', $start_date)
            ->where('end_date', '>=', now()->toDateString())
            ->where('status', 'open')
            ->orderBy('start_date', 'asc')
            ->get(['id', 'start_date', 'end_date', 'departure_time', 'price_adult', 'price_child']);

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công.',
            'data' => [
                'tour' => $tour,
                'image_url' => $imageUrls,
                'departures' => $departures,
                'timelines' => $timelines
            ]
        ]);
    }

    public function suggest()
    {
        try {
            $tours = DB::table('tours')
                ->join('images', 'images.tour_id', '=', 'tours.id')
                ->join('departures', 'departures.tour_id', '=', 'tours.id')
                ->select(
                    'tours.id',
                    'tours.title',
                    'tours.destination',
                    'tours.slug',
                    DB::raw('MIN(images.image_url) as image_url'),
                    DB::raw('SUM(departures.booked) as total_booked')
                )
                ->groupBy('tours.id', 'tours.title', 'tours.destination', 'tours.slug')

                ->orderByDesc('total_booked')
                ->limit(3)
                ->get();

            $tours = $tours->map(function ($item) {
                if ($item->image_url) {
                    $item->image_url = Storage::url($item->image_url);
                }
                return $item;
            });

            return response()->json([
                'status' => true,
                'message' => 'Thành công.',
                'data' => $tours
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Thất bại.'
            ], 500);
        }
    }
}
