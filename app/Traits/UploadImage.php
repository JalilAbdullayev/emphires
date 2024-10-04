<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImage {
    public function singleImg($request, string $field, ?string $path = null, $model): void {
        if($request->file($field)) {
            if($model->{$field} && Storage::exists('public/' . $model->{$field})) {
                Storage::delete('public/' . $model->{$field});
            }
            $name = explode('.', $request->{$field}->getClientOriginalName());
            $date = date('Y_m_d_H_i_s');
            $img = Str::slug($name[0]) . '_' . $date . '.' . $request->{$field}->extension();
            if($path) {
                $request->{$field}->move('storage/' . $path . '/', $img);
            } else {
                $request->{$field}->move('storage/', $img);
            }
            $model->{$field} = $img;
        }
    }
}
