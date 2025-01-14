<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarouselSlide;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    
    public function index()
    {
        $slides = CarouselSlide::all();
        return view('admin.carousel.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('carousel_images', 'public');

        CarouselSlide::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel Slide Created Successfully');
    }

    public function edit($id)
    {
        $slide = CarouselSlide::findOrFail($id);
        return view('admin.carousel.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $slide = CarouselSlide::findOrFail($id);
        $slide->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('carousel_images', 'public');
            $slide->update(['image_path' => $imagePath]);
        }

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel Slide Updated Successfully');
    }

    public function destroy($id)
    {
        $slide = CarouselSlide::findOrFail($id);
        $slide->delete();

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel Slide Deleted Successfully');
    }
}
