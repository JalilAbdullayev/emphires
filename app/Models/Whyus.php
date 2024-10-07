<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Whyus extends Model
{
    use HasTranslations, SoftDeletes;
    protected $fillable = ['title', 'description', 'icon', 'order', 'status'];
    protected array $translatable = ['title', 'description'];
}
