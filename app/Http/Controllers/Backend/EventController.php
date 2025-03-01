<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\DataTables\EventDataTable;

class EventController extends Controller
{
    public function index(EventDataTable $dataTable)
    {
        return $dataTable->render('admin.events.index');
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'banner'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->except('banner');
    
        if ($request->hasFile('banner')) {
            $filePath = uploadImage($request->file('banner'), 'events');
            $data['banner'] = $filePath;
        }
    
        Event::create($data);
    
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event created successfully.');
    }    

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'banner'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $event = Event::findOrFail($id);
        $data = $request->except('banner');
    
        if ($request->hasFile('banner')) {
            if ($event->banner) {
                deleteImages($event->banner);
            }
            $filePath = uploadImage($request->file('banner'), 'events');
            $data['banner'] = $filePath;
        }
    
        $event->update($data);
    
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->banner) {
            deleteImages($event->banner);
        }
        $event->delete();
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event deleted successfully.');
    }
}
