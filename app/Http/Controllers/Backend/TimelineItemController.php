<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TimelineItemDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimelineItem;

class TimelineItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TimelineItemDataTable $dataTable)
    {
        return $dataTable->render('admin.timeline_items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.timeline_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'title'=> 'required',
        ]);
        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            $filePath = uploadImage($request->file('image_path'), 'history');
            $data['image_path'] = $filePath;
        }
        TimelineItem::create($data);
        return redirect()->route('admin.timeline-items.index')->with('success', 'Event created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $timeline = TimelineItem::findOrFail($id);
        return view('admin.timeline_items.edit',compact('timeline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'year' => 'required',
            'title'=> 'required',
        ]);
        $timeline = TimelineItem::findOrFail($id);
        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            $filePath = uploadImage($request->file('image_path'), 'history');
            $data['image_path'] = $filePath;
        }
        $timeline->update($data);
        return redirect()->route('admin.timeline-items.index')->with('success', 'Timeline updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $timeline = TimelineItem::findOrFail($id);
        if($timeline->image_path){
            deleteImages($timeline->image_path);
        }
        $timeline->delete();
        return redirect()->route('admin.timeline_items.index')->with('success', 'Timeline deleted successfully.');

    }
}
