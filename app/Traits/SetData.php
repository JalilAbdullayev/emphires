<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

trait SetData
{
    public array $languages = ['en', 'az', 'ru'];
    public function setTranslated($model, string $field): void
    {
        foreach ($this->languages as $language) {
            $model->setTranslation($field, $language, Request::input($field . '_' . $language));
        }
    }

    public function setSlug(Model $model): void
    {
        foreach ($this->languages as $language) {
            $model->setTranslation('slug', $language, Str::slug(Request::input('slug_' . $language)));
        }
    }
}
