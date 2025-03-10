<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;

class NewsEventControllerler extends Controller
{
    function index(){
        $events =Event::select('title','event_date','location','description','banner','slug') ->latest('event_date')->get();
        $news = News::select('title', 'banner', 'publish_date', 'description','slug')
        ->latest('publish_date') 
        ->get();
            $data = ['events'=>$events,'news'=>$news];
        return view('frontend.event-news.index',$data);
    }

    function show_event($slug)
    {
        $event = Event::select('title','event_date','location','description','banner')->where('slug',$slug)->first();
        $data = ['event'=>$event];
        return view('frontend.event-news.inner-event',$data);
    }

    function show_news($slug)
    {
        $news = News::select('title', 'banner', 'publish_date', 'description')->where('slug',$slug)->first();
        $data = ['news'=>$news];
        return view('frontend.event-news.inner-news',$data);

    }
}
