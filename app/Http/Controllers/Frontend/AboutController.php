<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;

class AboutController extends Controller
{
    public function index()
    {
        $mission    = AboutSection::with('items')->where('section_name', 'mission')->first();
        $vision     = AboutSection::with('items')->where('section_name', 'vision')->first();
        $coreValues = AboutSection::with('items')->where('section_name', 'core_values')->first();
        $team       = AboutSection::with('items')->where('section_name', 'team')->first();

        return view('frontend.about.index', compact('mission', 'vision', 'coreValues', 'team'));
    }
}
