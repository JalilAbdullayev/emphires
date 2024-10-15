<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Stat extends Model {
    use SoftDeletes, HasTranslations;

    protected $fillable = ['name', 'count', 'status', 'order'];
    protected array $translatable = ['name'];

    public function scopeActive() {
        return $this->whereStatus(1)->orderBy('order');
    }
}
