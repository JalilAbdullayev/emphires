<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Course extends Model {
    use HasTranslations, SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'image', 'status', 'category_id', 'author_id', 'order', 'background', 'bg_status', 'video_link', 'keywords'];
    protected $translatable = ['title', 'slug', 'description', 'keywords', 'text'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function scopeActive() {
        return $this->whereStatus(1)->orderBy('order');
    }
}
