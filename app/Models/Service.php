<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'text',
        'keywords',
        'image',
        'status',
        'background',
        'bg_status',
        'order'
    ];

    protected array $translatable = ['title', 'slug', 'description', 'text', 'keywords'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
