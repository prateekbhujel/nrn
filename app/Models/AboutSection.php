<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    
class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'title',
        'description'
    ];

    public function items()
    {
        return $this->hasMany(AboutSectionItem::class);
    }
}
