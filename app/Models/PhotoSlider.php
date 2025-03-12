<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoSlider extends Model
{
    protected $fillable = ['main_title','sub_title','category','main_image'];
    use HasFactory;
}
