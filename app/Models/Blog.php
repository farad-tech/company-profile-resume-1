<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    protected $casts = [
        'keywords' => 'array',
    ];

    protected $fillable = [
        'title',
        'image',
        'content',
        'category',
        'keywords',
        'author',
    ];

    public $translatable = [
        'title',
        'content',
        'keywords',
    ];
}
