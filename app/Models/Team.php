<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Team extends Model {
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'image',
        'status',
        'order',
        'image'
    ];

    protected array $translatable = [
        'name',
        'position'
    ];
}
