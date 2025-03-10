<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
class HomeController extends Controller
{
    function index(){
        $events =Event::select('title','event_date','location','description','banner','slug')->get();
        $data = ['events'=>$events];
        return view('frontend.home.index',$data);
    }
}
