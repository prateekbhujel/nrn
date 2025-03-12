<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'main_image','project_title','project_description','sub_motto'];

    public function galleryImages()
    {
        return $this->hasMany(ProjectImage::class);
    }
}