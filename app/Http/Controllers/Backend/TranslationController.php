<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;
use Illuminate\Support\Facades\Artisan;

class TranslationController extends Controller
{
    private function getTranslatableModels()
    {
        $models = [];
        foreach (glob(app_path('Models/*.php')) as $file) {
            $class = 'App\\Models\\' . basename($file, '.php');
            if (class_exists($class) && in_array('App\\Traits\\Translatable', class_uses($class))) {
                $models[] = $class;
            }
        }
        return $models;
    }

    public function scanTranslations()
    {
        Artisan::call('translations:scan');
        return redirect()->back()->with('success', 'Translations scanned and updated successfully.');
    }

    public function index(Request $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        $type = $request->get('type', 'all');
        $model = $request->get('model');

        $query = Translation::query();

        if ($locale) {
            $query->where('locale', $locale);
        }

        if ($type === 'static') {
            $query->static();
        } elseif ($type === 'dynamic') {
            $query->dynamic();
            if ($model) {
                $query->where('translatable_type', $model);
            }
        }

        $translations = $query->paginate(20);

        $locales = Translation::select('locale')
            ->distinct()
            ->pluck('locale');

        $translatableModels = $this->getTranslatableModels();

        return view('admin.translations.index', compact('translations', 'locales', 'locale', 'type', 'translatableModels', 'model'));
    }

    public function update(Request $request, $id)
    {
        $translation = Translation::findOrFail($id);
        $translation->update($request->only('value'));
        return redirect()->back()->with('success', 'Translation updated successfully.');
    }

    public function createTranslation(Request $request)
    {
        $request->validate([
            'translation_key' => 'required',
            'value' => 'required',
        ]);

        $locales = array_keys(config('languages'));

        foreach ($locales as $locale) {
            Translation::create([
                'translatable_id' => 0,
                'translatable_type' => 'static',
                'translation_key' => $request->translation_key,
                'locale' => $locale,
                'value' => $request->value,
            ]);
        }

        return redirect()->back()->with('success', 'Translations created for all locales.');
    }
}