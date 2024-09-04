<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HoemController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->take(5)->get();
        $projects = Project::where('status', 1)->latest()->take(5)->get();
        return view('frontend.homepage.index', compact('testimonials','projects'));
    }
    public function about()
    {
        return view('frontend.about.index');
    }
    public function contact()
    {
        return view('frontend.contact.index');
    }
}
