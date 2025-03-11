<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\DataTables\NewsDataTable;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'publish_date'  => 'required',
            'description'   => 'required',
            'banner'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->except('banner');
        $data['slug'] = Str::slug($data['title']) . '-'.time();

        if ($request->hasFile('banner')) {
            $filePath = uploadImage($request->file('banner'), 'news');
            $data['banner'] = $filePath;
        }
    
        News::create($data);
    
        return redirect()->route('admin.news.index')
                         ->with('success', 'News created successfully.');
    }    

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required',
            'publish_date'  => 'required',
            'description'   => 'required',
            'banner'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $news = News::findOrFail($id);
        $data = $request->except('banner');
        $data['slug'] = Str::slug($request->title) . '-'.time();
        if ($request->hasFile('banner')) {
            if ($news->banner) {
                deleteImages($news->banner);
            }
            $filePath = uploadImage($request->file('banner'), 'news');
            $data['banner'] = $filePath;
        }
    
        $news->update($data);
    
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->banner) {
            deleteImages($news->banner);
        }
        $news->delete();
        return redirect()->route('admin.news.index')
                         ->with('success', 'News deleted successfully.');
    }
}
