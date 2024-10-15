<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model {
    use HasTranslations, SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['title', 'slug', 'status', 'order'];
    protected array $translatable = ['title', 'slug'];

    public function services(): HasMany {
        return $this->hasMany(Service::class);
    }

    public function blog(): HasMany {
        return $this->hasMany(Blog::class);
    }

    public function courses(): HasMany {
        return $this->hasMany(Course::class);
    }
}
