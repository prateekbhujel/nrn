<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use App\Models\Project;
use App\Models\PhotoSlider;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    function index(){
        $events = Event::select('title', 'event_date', 'location', 'description', 'banner', 'slug')
        ->orderBy('event_date', 'desc')
        ->take(3)
        ->get()
        ->map(function ($event) {
            $event->description = Str::words($event->description, 20);
            return $event;
        });

        $news = News::select('title', 'publish_date', 'banner', 'description', 'slug')
        ->orderBy('publish_date', 'desc')
        ->take(3)
        ->get()
        ->map(function($newsItem) {
            $newsItem->description = Str::words($newsItem->description, 20);
            return $newsItem;
        });

        $projects = Project::select('title', 'slug', 'description', 'main_image')
        ->orderBy('id', 'desc')
        ->take(3)
        ->get()
        ->map(function($project) {
            $project->description = Str::words($project->description, 20);
            return $project;
        });

$photoslider = PhotoSlider::select('main_title','sub_title','category','main_image')->get();

        $data = ['events'=>$events, 'news'=>$news, 'projects'=>$projects , 
        'photoslider'=>$photoslider];
        return view('frontend.home.index',$data);
    }
}
