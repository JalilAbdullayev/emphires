<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Settings extends Model {
    use HasTranslations;

    protected $fillable = [
        'title',
        'author',
        'description',
        'keywords',
        'logo',
        'favicon'
    ];

    protected array $translatable = [
        'title',
        'author',
        'description',
        'keywords'
    ];
}
