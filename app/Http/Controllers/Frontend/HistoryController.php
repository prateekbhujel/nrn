<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimelineItem;
use App\Models\Achievement;

class HistoryController extends Controller
{
    function index(){
        $history = TimelineItem::select('year','title','image_path','description')->get();
        $achievements = Achievement::select('title','value')->get();
        return view('frontend.history.index',['history'=>$history,'achievements'=>$achievements]);
    }
}