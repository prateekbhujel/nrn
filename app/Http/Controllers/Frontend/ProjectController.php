<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    function index(){
        $project = Project::select('title','slug','description','main_image')->get();
        return view('frontend.project.index',['project'=>$project]);
    }

    function show_project($slug)
    {
        $project =  Project::select('title','slug','description','main_image')->where('slug',$slug)->first();
        return view('frontend.project.project-inner',['project'=>$project]);
    }
}
