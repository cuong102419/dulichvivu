<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list()
    {
        return view('client.blog.list');
    }

    public function detail()
    {
        return view('client.blog.detail');
    }
}