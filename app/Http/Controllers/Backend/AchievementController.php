<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AchievementDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AchievementDataTable $dataTable)
    {
        return $dataTable->render('admin.achievements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'value'=>'required', 
        ]);
        $data = $request->all();
        Achievement::create($data);

        return redirect()->route('admin.achievements.index')->with('success','Achivement created successfully. ');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('admin.achievements.edit',compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'value'=>'required', 
        ]);
        $achievement = Achievement::findOrFail($id);
        $data = $request->all();
        $achievement->update($data);
        return redirect()->route('admin.achievements.index')->with('success','Achievement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully.');
    }
}
