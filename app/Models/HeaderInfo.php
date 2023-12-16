<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeaderInfo extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'value',
    ];

    protected $fillable = [
        'title',
        'value',
        'icon',
        'url',
    ];
}
