<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardMember;

class BoardControllerler extends Controller
{
    function index(){
        $executive = BoardMember::select('name','position','type','image_path','description','areas_of_expertise')->where('type','executive')->get();
        $advisory = BoardMember::select('name','position','type','image_path','description','areas_of_expertise')->where('type','advisory')->get();
        $data = ["executive"=> $executive,'advisory'=>$advisory ];
        return view('frontend.board.index',$data);
    }
}
