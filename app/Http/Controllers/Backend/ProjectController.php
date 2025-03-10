<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\DataTables\ProjectDataTable;

class ProjectController extends Controller
{
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.projects.index');
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('main_image');

        if ($request->hasFile('main_image')) {
            $filePath = uploadImage($request->file('main_image'));
            $data['main_image'] = $filePath;
        }

        $data['slug'] = \Illuminate\Support\Str::slug($request->title) . '-' . time();
        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = Project::findOrFail($id);
        $data = $request->except('main_image');

        if ($request->hasFile('main_image')) {
            if ($project->main_image) {
                deleteImages($project->main_image);
            }
            $filePath = uploadImage($request->file('main_image'));
            $data['main_image'] = $filePath;
        }

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->main_image) {
            deleteImages($project->main_image);
        }
        foreach ($project->galleryImages as $image) {
            if ($image->image_path) {
                deleteImages($image->image_path);
            }
            $image->delete();
        }
        $project->delete();
        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    // Gallery Management
    public function galleryCreate($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.gallery.create', compact('project'));
    }

    public function galleryStore(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'nullable',
            'description' => 'nullable',
        ]);

        $data = $request->only(['title', 'description']);
        if ($request->hasFile('image')) {
            $filePath = uploadImage($request->file('image'));
            $data['image_path'] = $filePath;
        }

        $project = Project::findOrFail($id);
        $project->galleryImages()->create($data);

        return redirect()->route('admin.projects.edit', $id)
            ->with('success', 'Gallery image added successfully.');
    }

    public function galleryDestroy($id)
    {
        $galleryImage = \App\Models\ProjectImage::findOrFail($id);
        if ($galleryImage->image_path) {
            deleteImages($galleryImage->image_path);
        }
        $galleryImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery image deleted successfully.'
        ]);
    }
}