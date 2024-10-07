<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations, SoftDeletes;
    protected $fillable = ['title', 'slug', 'description', 'keywords', 'text', 'category_id', 'author_id', 'date', 'order', 'status'];
    protected $translatable = ['title', 'slug', 'description', 'keywords', 'text'];
}
