<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;

class HomeController extends Controller
{
    public function __invoke()
    {
        $brands = Brand::with('products')->get();
        $sliders = Slider::all();
        return view('home.index', compact('brands', 'sliders'));
    }
}
