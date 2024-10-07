<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Skill extends Model
{
    use HasTranslations, SoftDeletes;
    protected $fillable = ['title', 'percent', 'status', 'order'];
    protected $translatable = ['title'];
}
