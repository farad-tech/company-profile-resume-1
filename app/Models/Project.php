<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'title',
        'address'
    ];
    
    protected $casts = [
        'images' => 'array'
    ];

    protected $fillable = [
        'title',
        'address',
        'images'
    ];
}
