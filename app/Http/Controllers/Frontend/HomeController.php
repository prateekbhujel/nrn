<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;
class HomeController extends Controller
{
    function index(){
        $events =Event::select('title','event_date','location','description','banner','slug') ->latest('event_date')->take(3) ->get();
        $news = News::select('title', 'banner', 'publish_date', 'description','slug')->latest('publish_date')->take(3)->get();
        $data = ['events'=>$events,'news'=>$news];
        return view('frontend.home.index',$data);
    }
}
