<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\custom;
use App\Models\HeaderSliders;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HeaderSliders::all();
        $about  = custom::where('title', 'about')->first();

        return response()->view('public.pages.index', compact('slides', 'about'));
    }
}
