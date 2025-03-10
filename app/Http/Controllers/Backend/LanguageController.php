<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\LanguageDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index(LanguageDataTable $dataTable)
    {
        return $dataTable->render('admin.languages.index');
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name'   => 'required',
        'locale' => 'required|unique:languages,locale',
    ]);

    $language = Language::create($request->all());

    // Get all existing translation keys
    $existingKeys = \App\Models\Translation::distinct()->pluck('translation_key');

    // Add missing translations for the new language
    foreach ($existingKeys as $key) {
        \App\Models\Translation::firstOrCreate([
            'translation_key' => $key,
            'locale' => $language->locale,
        ], [
            'value' => ucfirst(str_replace('.', ' ', $key)) // Default translation
        ]);
    }

    return redirect()->route('admin.languages.index')
                     ->with('success', 'Language added successfully and translations updated.');
}


    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.languages.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $oldLocale = $language->locale;
    
        $request->validate([
            'name'   => 'required',
            'locale' => 'required|unique:languages,locale,' . $id,
        ]);
    
        $language->update($request->all());
        $newLocale = $request->locale;
    
        // Update existing translations with the new locale
        \App\Models\Translation::where('locale', $oldLocale)->update(['locale' => $newLocale]);
    
        return redirect()->route('admin.languages.index')
                         ->with('success', 'Language updated successfully and translations adjusted.');
    }
    

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        return redirect()->route('admin.languages.index')
                         ->with('success', 'Language deleted successfully.');
    }

    public function setLocale(Request $request)
    {
        // dd($request->all());
        $locale = $request->input('locale');
        session(['locale' => $locale]);
        // dd(session('locale'));
        app()->setLocale($locale);

        return redirect()->back();
    }
}

