<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelGuideController extends Controller
{
    public function list() {
        return view('client.tour.guide');
    }
}
