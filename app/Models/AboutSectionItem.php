<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_section_id',
        'item_title',
        'content',
        'icon',
        'order'
    ];

    public function section()
    {
        return $this->belongsTo(AboutSection::class, 'about_section_id');
    }
}
