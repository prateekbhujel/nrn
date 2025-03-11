<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PhotoSliderDataTable;
use App\Models\PhotoSlider;
class PhotoSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoSliderDataTable $dataTable)
    {
        return $dataTable->render('admin.photoslider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photoslider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'main_title' => 'required',
            'main_image'=>'required'
        ]);
        $data = $request->except(['_token', 'main_image']);

        if ($request->hasFile('main_image')) {
            $filePath = uploadImage($request->file('main_image'), 'photoslider');
            $data['main_image'] = $filePath;
        }
        PhotoSlider::create($data);
        return redirect()->route('admin.photoslider.create')->with('success','Photo uploaded successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
