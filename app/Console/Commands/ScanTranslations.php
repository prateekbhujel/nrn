<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Translation;

class ScanTranslations extends Command
{
    protected $signature = 'translations:scan';
    protected $description = 'Scan for static and dynamic translatable content';

    public function handle()
    {
        $defaultLocale = config('app.fallback_locale', 'en');
        $newKeysCount = 0;

        // Scan static translations
        $staticKeys = $this->scanStaticTranslations();
        foreach ($staticKeys as $key) {
            $exists = Translation::where('translation_key', $key)
                ->where('locale', $defaultLocale)
                ->where('translatable_id', 0)
                ->where('translatable_type', 'static')
                ->exists();

            if (!$exists) {
                Translation::create([
                    'translatable_id' => 0,
                    'translatable_type' => 'static',
                    'translation_key' => $key,
                    'locale' => $defaultLocale,
                    'value' => ucfirst(str_replace('.', ' ', $key)),
                ]);
                $newKeysCount++;
                $this->info("Added static key: {$key}");
            }
        }

        // Scan dynamic translations
        $translatableModels = $this->getTranslatableModels();
        foreach ($translatableModels as $modelClass) {
            $model = new $modelClass();
            $translatableAttributes = $model->translatable ?? [];
            $instances = $modelClass::all();

            foreach ($instances as $instance) {
                foreach ($translatableAttributes as $attribute) {
                    $exists = $instance->translations()
                        ->where('translation_key', $attribute)
                        ->where('locale', $defaultLocale)
                        ->exists();

                    if (!$exists) {
                        $instance->translations()->create([
                            'translation_key' => $attribute,
                            'locale' => $defaultLocale,
                            'value' => $instance->$attribute ?? ucfirst($attribute),
                        ]);
                        $newKeysCount++;
                        $this->info("Added dynamic translation for {$modelClass} #{$instance->id} - {$attribute}");
                    }
                }
            }
        }

        $this->info("Scanning complete. {$newKeysCount} new translations added.");
    }

    private function scanStaticTranslations()
    {
        $directories = [
            resource_path('views'),
            app_path(),
        ];

        $pattern = '/db_trans\([\'"]([^\'"]+)[\'"]\)/';
        $foundKeys = [];

        foreach ($directories as $dir) {
            $files = File::allFiles($dir);
            foreach ($files as $file) {
                $contents = $file->getContents();
                if (preg_match_all($pattern, $contents, $matches)) {
                    $foundKeys = array_merge($foundKeys, $matches[1]);
                }
            }
        }

        return array_unique($foundKeys);
    }

    private function getTranslatableModels()
    {
        $models = [];
        foreach (glob(app_path('Models/*.php')) as $file) {
            $class = 'App\\Models\\' . basename($file, '.php');
            if (in_array('App\\Traits\\Translatable', class_uses($class))) {
                $models[] = $class;
            }
        }
        return $models;
    }
}