<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model {
    use HasTranslations;

    protected $table = 'categories';
    protected $fillable = ['title', 'slug', 'status'];
    protected array $translatable = ['title', 'slug'];
}
