<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'title',
        'slug',
    ];

    protected $fillable = [
        'title',
        'slug',
    ];

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
