<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::query()->with('images', 'timeline')->get();
        // dd($tours);
        return view('client.home.home', compact('tours'));
    }
}
