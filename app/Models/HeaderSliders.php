<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeaderSliders extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'header_sliders';

    protected $translatable = [
        'title',
        'CallToActionTitle',
        'CallToActionURL',
        'image',
        'imageAlt',
    ];

    protected $fillable = [
        'title',
        'CallToActionTitle',
        'CallToActionURL',
        'image',
        'imageAlt',
    ];
}
