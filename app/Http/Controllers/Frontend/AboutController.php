<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;

class AboutController extends Controller
{
    function index(){
        $aboutus = Aboutus::get()->first();
        $data = ['aboutus'=> $aboutus];
        return view('frontend.about.index',$data);
    }
}
