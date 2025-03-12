<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectController extends Controller
{
    function index(){
        $project = Project::select('title','slug','description','main_image')->get();
        return view('frontend.project.index',['project'=>$project]);
    }
    
    public function show_project($slug)
    {
        $project = Project::select('id', 'title', 'slug', 'description', 'main_image','project_title','project_description','sub_motto')
            ->where('slug', $slug)
            ->firstOrFail();
    
        $projectImages = ProjectImage::where('project_id', $project->id)
            ->select('image_path', 'title', 'description')
            ->get();
    
        return view('frontend.project.project-inner', [
            'project' => $project,
            'projectImages' => $projectImages
        ]);
    }
    
}
