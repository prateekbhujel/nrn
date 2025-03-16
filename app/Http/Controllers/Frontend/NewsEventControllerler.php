<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
use Illuminate\Support\Str;

class NewsEventControllerler extends Controller
{
    function index(){
        $news =  News::select('title', 'publish_date', 'description', 'slug','banner')->get()    ->map(function($newsItem) {
            $newsItem->description = Str::words($newsItem->description, 20);
            return $newsItem;
        });
        $events =Event::select('title','event_date','location','description','banner','slug')->get()  ->map(function ($event) {
            $event->description = Str::words($event->description, 20);
            return $event;
        });
        $data = ['events'=>$events,'news'=> $news ];
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
        $news =  News::select('title', 'publish_date', 'description', 'slug','banner')->where('slug',$slug)->first();
        $data = ['news'=>$news];
        return view('frontend.event-news.inner-news',$data);
    }
}
