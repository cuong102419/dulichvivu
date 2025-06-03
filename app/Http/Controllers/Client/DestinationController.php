<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function list() {
        return view('client.destination.list');
    }

    public function detail() {
        return view('client.destination.detail');
    }
}
