<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Opengraph extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'og_title',
        'og_site_name',
        'og_url',
        'og_description',
    ];

    protected $fillable = [
        'og_title',
        'og_site_name',
        'og_url',
        'og_description',
        'og_type',
        'og_image',
        'page',
    ];
}
