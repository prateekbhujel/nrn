<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use App\Models\Project;
use App\Models\PhotoSlider;

class HomeController extends Controller
{
    function index(){
        $events = Event::select('title', 'event_date', 'location', 'description', 'banner', 'slug')
    ->orderBy('event_date', 'desc')
    ->take(3)
    ->get();

$news = News::select('title', 'publish_date', 'banner','description', 'slug')
    ->orderBy('publish_date', 'desc')
    ->take(3)
    ->get();

$projects = Project::select('title', 'slug', 'description', 'main_image')
    ->orderBy('id', 'desc') 
    ->take(3)
    ->get();

$photoslider = PhotoSlider::select('main_title','sub_title','category','main_image')->get();

        $data = ['events'=>$events, 'news'=>$news, 'projects'=>$projects , 
        'photoslider'=>$photoslider];
        return view('frontend.home.index',$data);
    }
}
