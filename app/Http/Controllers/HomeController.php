<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class HomeController extends Controller
{
    public function __invoke()
    {
        $brands = Brand::with('products')->get();
        return view('home.index', compact('brands'));
    }
}