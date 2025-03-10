<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class NewsEventControllerler extends Controller
{
    function index(){
        $events =Event::select('title','event_date','location','description','banner','slug')->get();
        $data = ['events'=>$events];
        return view('frontend.event-news.index',$data);
    }

    function show_event($slug)
    {
        $event = Event::select('title','event_date','location','description','banner')->where('slug',$slug)->first();
        $data = ['event'=>$event];
        return view('frontend.event-news.inner-event',$data);
    }
}
