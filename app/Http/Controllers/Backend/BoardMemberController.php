<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BoardMemberDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardMember;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BoardMemberDataTable $dataTable)
    {
        return $dataTable->render('admin.board_members.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.board_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'position'=> 'required',
            'type'=> 'required',
            'description'=>'required',
            'areas_of_expertise'=>'required',
        ]);
        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            $filePath = uploadImage($request->file('image_path'));
            $data['image_path'] = $filePath;
        }
        BoardMember::create($data);

        return redirect()->route('admin.board-members.index')->with('success', 'Board Member created successfully.');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $board = BoardMember::findOrFail($id);
        return view('admin.board_members.edit',compact('board'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name'=> 'required',
            'position'=> 'required',
            'type'=> 'required',
            'description'=>'required',
            'areas_of_expertise'=>'required',
        ]);

        $board = BoardMember::findOrFail($id);
        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            if ($board->image_path) {
                deleteImages($board->image_path);
            }
            $filePath = uploadImage($request->file('image_path'));
            $data['image_path'] = $filePath;
        }
        $board->update($data);

        return redirect()->route('admin.board-members.index')
                         ->with('success', 'Board members updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $board = BoardMember::findOrFail($id);
        if ($board->main_image) {
            deleteImages($board->main_image);
        }
         
            if ($board->image_path) {
                deleteImages($board->image_path);
            }
            $board->delete();
        
        $board->delete();
        return redirect()->route('admin.board-members.index')
                         ->with('success', 'board deleted successfully.');
    }
}
