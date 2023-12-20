<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'alt',
    ];

    protected $fillable = [
        'title',
        'image',
        'alt',
    ];
}
