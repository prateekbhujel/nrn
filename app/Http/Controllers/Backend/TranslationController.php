<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;

class TranslationController extends Controller
{
    public function index()
    {
        $translations = Translation::orderBy('translation_key')->get();
        return view('admin.translations.index', compact('translations'));
    }

    public function update(Request $request, $id)
    {
        $translation = Translation::findOrFail($id);
        $translation->update($request->only('value'));
        return redirect()->back()->with('success', 'Translation updated successfully.');
    }    
}

