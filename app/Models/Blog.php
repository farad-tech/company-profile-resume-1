<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
