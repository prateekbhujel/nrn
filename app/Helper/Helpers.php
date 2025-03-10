<?php

use Illuminate\Support\Facades\Storage;

/**
 * Upload an image file or multiple image files.
 *
 * @param \Illuminate\Http\UploadedFile|array $files
 * @param string $folder
 * @param string $disk
 * @return array|string|false The stored file path(s) or false on failure.
 */
function uploadImage($files, $folder = 'uploads', $disk = 'public')
{
    $paths = [];

    $files = is_array($files) ? $files : [$files];

    foreach ($files as $file) {
        $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($folder, $filename, $disk);
        if ($path) {
            $paths[] = $path;
        } else {
            return false;
        }
    }

    return count($paths) === 1 ? $paths[0] : $paths;
}

/**
 * Delete single or multiple images.
 *
 * @param string|array|null $paths The path(s) of images to delete.
 * @param string $disk The disk where images are stored (default: 'public').
 * @return bool True if deleted, false otherwise.
 */
function deleteImages(string|array|null $paths, string $disk = 'public'): bool
{
    if (!$paths) {
        return false;
    }

    $paths = is_array($paths) ? $paths : [$paths];

    foreach ($paths as $path) {
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        } elseif (file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }

    return true;
}


if (! function_exists('db_trans')) {
    /**
     * Retrieve the translation for the given key based on the current locale.
     *
     * @param  string  $key
     * @return string
     */
    function db_trans($key)
    {
        $locale = app()->getLocale();
        $translation = \App\Models\Translation::static()
            ->where('translation_key', $key)
            ->where('locale', $locale)
            ->first();
        return $translation ? $translation->value : $key;
    }
}
