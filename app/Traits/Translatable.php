<?php

namespace App\Traits;

trait Translatable
{
    public function translations()
    {
        return $this->morphMany('App\Models\Translation', 'translatable');
    }

    public function getTranslatedAttribute($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations()
            ->where('translation_key', $key)
            ->where('locale', $locale)
            ->first()?->value ?? $this->attributes[$key] ?? '';
    }

    public function setTranslatedAttribute($key, $value, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $this->translations()->updateOrCreate(
            ['translation_key' => $key, 'locale' => $locale],
            ['value' => $value]
        );
    }
}