<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Translation;
use App\Models\Language;

class ScanTranslations extends Command
{
    protected $signature = 'translations:scan';
    protected $description = 'Scan the code for translatable keys and update the translations table';

    public function handle()
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
                    foreach ($matches[1] as $key) {
                        $foundKeys[] = $key;
                    }
                }
            }
        }

        $foundKeys = array_unique($foundKeys);
        $this->info('Found keys: ' . count($foundKeys));

        $languages = Language::pluck('locale')->toArray();
        $newKeysCount = 0;

        foreach ($foundKeys as $key) {
            foreach ($languages as $locale) {
                $exists = Translation::where('translation_key', $key)
                    ->where('locale', $locale)
                    ->exists();

                if (!$exists) {
                    Translation::create([
                        'translation_key' => $key,
                        'locale'          => $locale,
                        'value'           => ucfirst(str_replace('.', ' ', $key)), 
                    ]);
                    $newKeysCount++;
                    $this->info("Added key: {$key} for locale: {$locale}");
                }
            }
        }

        $this->info("Scanning complete. {$newKeysCount} new keys added.");
    }
}


