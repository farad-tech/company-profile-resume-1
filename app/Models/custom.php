<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class custom extends Model
{
    use HasFactory, HasTranslations;

    protected $casts = [
        'content' => 'array',
    ];

    public $translatable = [
        'content',
    ];

    protected $fillable = [
       'title',
       'content', 
    ]; 
}
