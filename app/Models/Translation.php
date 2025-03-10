<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'translatable_id',
        'translatable_type',
        'translation_key',
        'locale',
        'value',
    ];

    public function translatable()
    {
        return $this->morphTo();
    }

    // Scope for static translations
    public function scopeStatic($query)
    {
        return $query->where('translatable_id', 0)->where('translatable_type', 'static');
    }

    // Scope for dynamic translations
    public function scopeDynamic($query)
    {
        return $query->whereNotNull('translatable_id')->where('translatable_id', '!=', 0);
    }
}