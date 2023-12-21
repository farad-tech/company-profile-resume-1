<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FooterLink extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'title',
    ];

    protected $fillable = [
        'title',
        'url',
        'group',
    ];
}
