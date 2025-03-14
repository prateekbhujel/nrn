<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization_name',
        'organization_motto',
        'organization_email',
        'organization_number',
        'about_organisation',
        'organization_address',
        'about_organization',
        'organization_favicon',
        'organization_logo'
    ];
}
