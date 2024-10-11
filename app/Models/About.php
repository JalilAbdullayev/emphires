<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model {
    use HasTranslations;

    protected $fillable = [
        'title',
        'services_status',
        'specialties_title',
        'specialties_subtitle',
        'specialties_button',
        'specialties_card',
        'specialties_bg',
        'specialties_status',
        'team_title',
        'team_subtitle',
        'team_status',
        'banner_text',
        'banner_button',
        'banner_status',
        'banner_bg',
        'testimonials_title',
        'testimonials_subtitle',
        'testimonials_status',
        'testimonials_description',
        'testimonials_img',
        'testimonials_number',
        'testimonials_img_title',
        'contact_banner_status',
        'background',
        'status',
        'bg_status'
    ];

    protected array $translatable = [
        'title',
        'specialties_title',
        'specialties_subtitle',
        'specialties_button',
        'specialties_card',
        'team_title',
        'team_subtitle',
        'banner_text',
        'banner_button',
        'testimonials_title',
        'testimonials_subtitle',
        'testimonials_img_title'
    ];
}
