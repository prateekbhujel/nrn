<?php

use Illuminate\Support\Facades\Storage;

/**
 * Upload an image file.
 *
 * @param \Illuminate\Http\UploadedFile $file
 * @param string $folder
 * @param string $disk
 * @return string|false The stored file path or false on failure.
 */
function uploadImage($file, $folder = 'uploads', $disk = 'public')
{
    $filename = time() . '.' . $file->getClientOriginalExtension();
    return $file->storeAs($folder, $filename, $disk);
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
