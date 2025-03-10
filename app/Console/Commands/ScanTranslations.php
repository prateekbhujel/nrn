<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Translation;

class ScanTranslations extends Command
{
    protected $signature = 'translations:scan';
    protected $description = 'Scan the code for translatable keys and update the translations table';

    public function handle()
    {
        // Directories to scan
        $directories = [
            resource_path('views'),
            app_path(), // add more if needed
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

        $defaultLocale = config('app.fallback_locale', 'en');
        $newKeysCount = 0;
        foreach ($foundKeys as $key) {
            // Check if the key exists for the default locale
            $exists = Translation::where('translation_key', $key)
                ->where('locale', $defaultLocale)
                ->exists();
            if (! $exists) {
                Translation::create([
                    'translation_key' => $key,
                    'locale'          => $defaultLocale,
                    'value'           => ucfirst(str_replace('.', ' ', $key)), // e.g., "Form Title"
                ]);
                $newKeysCount++;
                $this->info("Added key: {$key}");
            }
        }
        $this->info("Scanning complete. {$newKeysCount} new keys added.");
    }
}

