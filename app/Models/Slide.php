<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Slide extends Model
{
    use HasTranslations, SoftDeletes;
    protected $fillable = ['title', 'subtitle', 'image', 'video_link', 'button_text', 'status', 'order'];
    protected array $translatable = ['title', 'subtitle', 'button_text'];
}
