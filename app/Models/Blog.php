<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'content',
        'keywords',
    ];

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

    protected function author(): Attribute
    {
        return Attribute::make(
            set: function () {
                return Auth::id();
            },
        );
    }
}
