<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'title', 'publish_date', 'description', 'banner'
    ];
    protected $translatable = ['title', 'description'];

    public function save(array $options = [])
    {
        $result = parent::save($options);

        if ($result) {
            foreach ($this->translatable as $field) {
                if (isset($this->attributes[$field])) {
                    $this->setTranslatedAttribute($field, $this->attributes[$field]);
                }
            }
        }

        return $result;
    }

    public function getTitleAttribute($value)
    {
        return $this->getTranslatedAttribute('title');
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getTranslatedAttribute('description');
    }

}
