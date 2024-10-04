<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model {
    use HasTranslations;

    protected $fillable = [
        'email',
        'phone',
        'map',
        'address',
        'status',
        'title',
        'form_title',
        'form_subtitle',
        'form_description',
        'banner_text',
        'banner_status',
        'form_status',
        'bg_status',
        'work_hours',
        'background'
    ];

    protected array $translatable = [
        'address',
        'title',
        'form_title',
        'form_subtitle',
        'form_description',
        'banner_text',
        'work_hours'
    ];
}
