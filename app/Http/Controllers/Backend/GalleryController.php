<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\DataTables\GalleryDataTable;

class GalleryController extends Controller
{
    public function index(GalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.galleries.index');
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner*'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'       => 'nullable|min:1|max:200',
            'description' => 'nullable|min:10|max:500',
        ]);

        $data = $request->except('banner');

        if ($request->hasFile('banner')) {
            $filePaths = uploadImage($request->file('banner'), 'gallery');
            $data['banner'] = $filePaths;
        }

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery Item Created successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'banner*'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'       => 'nullable|min:1|max:200',
            'description' => 'nullable|min:10|max:500',
        ]);
    
        $gallery = Gallery::findOrFail($id);
        $data = $request->except('banner');
    
        if ($request->hasFile('banner')) {
            // Ensure the existing banner is an array:
            $existing = is_array($gallery->banner)
                ? $gallery->banner
                : ($gallery->banner ? [$gallery->banner] : []);
                
            $filePaths = uploadImage($request->file('banner'), 'gallery');
            if (!is_array($filePaths)) {
                $filePaths = [$filePaths];
            }
            // Merge new uploads with existing images
            $data['banner'] = array_merge($existing, $filePaths);
        }
    
        $gallery->update($data);
    
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Item updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->banner) {
            deleteImages($gallery->banner);
        }
        $gallery->delete();
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Item deleted successfully.');
    }
}
