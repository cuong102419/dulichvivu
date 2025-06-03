<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function list() {
        $tours = Tour::with('images', 'timeline')->get();
        // dd($tours);
        return view('client.tour.list', compact('tours'));
    }

    public function detail(Tour $tour) {
        return view('client.tour.detail', compact('tour'));
    }
}
