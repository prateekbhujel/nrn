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
        $photoslider = PhotoSlider::findOrFail($id);
        return view('admin.photoslider.edit', compact('photoslider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'main_title' => 'required',
            'main_image'=>'required'
        ]);
        $photoslider = PhotoSlider::findOrFail($id);
        $data = $request->except('main_image');
        if ($request->hasFile('main_image')) {
            if ($data->main_image) {
                deleteImages($data->main_image);
            }
            $filePath = uploadImage($request->file('main_image'), 'photoslider');
            $data['photoslider'] = $filePath;
    }
    $photoslider->update($data);
    return redirect()->route('admin.photoslider.index')->with('success', 'Photoslider updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photoslider = PhotoSlider::findOrFail($id);
        if ($photoslider->main_image) {
            deleteImages($photoslider->main_image);
            }
            $photoslider->delete();
            return redirect()->route('admin.photoslider.index')->with('success', 'photoslider deleted successfully.');
    }
}
