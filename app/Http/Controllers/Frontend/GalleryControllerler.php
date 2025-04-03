<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryControllerler extends Controller
{
    public function index()
    {
        $galleries = Gallery::select('title', 'date', 'location', 'banner', 'description' ,'slug')->get();
    
        foreach ($galleries as $gallery) {
            // Since banner is already an array, use it directly.
            $banners = $gallery->banner;
            $gallery->thumbnail = (!empty($banners) && is_array($banners)) ? $banners[0] : 'default-image.jpg';
        }
        return view('frontend.gallery.index', compact('galleries'));
    }

    public function innerGallery($slug)
    {
        $galleries = Gallery::select('title', 'banner')->where('slug', $slug) ->get(); 
        return view('frontend.gallery.inner-gallery', compact('galleries'));
    }

}
