<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;

class AboutusController extends Controller
{
    function index()
    {
        $aboutus = Aboutus::get()->first();
        return view('admin.aboutus.update',compact('aboutus'));
    }

    function save(Request $request){
        $data = $request->except('_token');
        if (!AboutUs::where('id', 1)->update($data)) {
            throw new Exception("Couldn't Save Records", 1);
        }
        return redirect()->route('admin.aboutus')->with('success','About us updated successfully');
    }
}
