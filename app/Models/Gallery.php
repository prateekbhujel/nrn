<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'date', 'location', 'description', 'banner', 'thumbnail'
    ];

    protected $casts = [
        'banner' => 'array'
    ];

    /**
     * Accessor for thumbnail attribute.
     * Returns the explicitly set thumbnail if available; otherwise, defaults to the first banner image.
     *
     * @param  string|null  $value
     * @return string
     */
    public function getThumbnailAttribute($value)
    {
        if ($value) {
            return $value;
        }

        if (is_array($this->banner) && count($this->banner) > 0) {
            return $this->banner[0];
        }

        // Fallback if no banner or thumbnail exists.
        return 'default-thumbnail.jpg';
    }
}
