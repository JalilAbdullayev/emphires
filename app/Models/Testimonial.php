<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations, SoftDeletes;
    protected $fillable = ['name', 'text', 'image', 'status', 'position', 'order'];
    protected array $translatable = ['name', 'text', 'position'];
}
