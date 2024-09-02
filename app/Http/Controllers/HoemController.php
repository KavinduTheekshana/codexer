<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class HoemController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('frontend.homepage.index', compact('testimonials'));
    }
}
