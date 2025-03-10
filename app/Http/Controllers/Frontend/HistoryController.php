<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimelineItem;

class HistoryController extends Controller
{
    function index(){
        $history = TimelineItem::select('year','title','image_path','description')->get();
        return view('frontend.history.index',['history'=>$history]);
    }
}
