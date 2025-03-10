<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['translation_key', 'locale', 'value'];

    public function language()
    {
        return $this->belongsTo(Language::class, 'locale', 'locale');
    }
}
