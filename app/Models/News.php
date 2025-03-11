<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['title', 'publish_date', 'description', 'banner', 'slug'];
   
}
