<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;
use Illuminate\Support\Facades\Artisan;

class TranslationController extends Controller
{

    public function scanTranslations()
    {
        Artisan::call('translations:scan');
        return redirect()->back()->with('success', 'Translations scanned and updated successfully.');
    }

    public function index()
    {
        $translations = Translation::where('locale', app()->getLocale())->get();
        return view('admin.translations.index', compact('translations'));
    }

    public function update(Request $request, $id)
    {
        $translation = Translation::findOrFail($id);
        $translation->update($request->only('value'));
        return redirect()->back()->with('success', 'Translation updated successfully.');
    }    
}

