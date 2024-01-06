<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Schema extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'page',
        'schema',
        'enabled',
    ];

    protected $fillable = [
        'page',
        'schema',
        'enabled',
    ];

}
