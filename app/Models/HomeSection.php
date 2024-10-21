<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class HomeSection extends Model {
    use HasTranslations, SoftDeletes;

    protected $guarded = ['id'];
    protected array $translatable = [
        'quote',
        'quote_author',
        'second_section_text',
        'who_us_title',
        'who_us_subtitle',
        'who_us_text',
        'who_us_percent_title',
        'who_us_foot',
        'who_us_link_title',
        'services_title',
        'services_subtitle',
        'services_text',
        'services_link_text',
        'services_foot_text',
        'services_foot_link_text',
        'video_text',
        'skills_text',
        'qualities_title',
        'qualities_subtitle',
        'qualities_text',
        'testimonials_title',
        'testimonials_subtitle',
        'testimonials_text',
        'testimonials_link_text',
        'courses_title',
        'courses_subtitle',
        'phone_title',
        'contact_title',
        'contact_subtitle'
    ];
}
