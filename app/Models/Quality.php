<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Quality extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = ['title', 'description', 'image', 'order', 'status'];
    protected $translatable = ['title', 'description'];
}
