<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

trait SetData {
    public array $languages = ['az', 'en', 'ru'];

    public function setTranslated($model, string $field): void {
        foreach($this->languages as $language) {
            $model->setTranslation($field, $language, Request::input($field . '_' . $language));
        }
    }

    public function setSlug(Model $model): void {
        foreach($this->languages as $language) {
            $model->setTranslation('slug', $language, Str::slug(Request::input('title_' . $language)));
        }
    }

    public function changeOrder(HttpRequest $request, $model): JsonResponse {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();
            foreach($order_data as $data) {
                $model::whereId($data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();
            return response()->json('sort_success');
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    public function changeStatus(HttpRequest $request, $model): JsonResponse {
        $data = $model::findOrFail($request->id);
        $status = $data->status;
        $data->status = $status ? 0 : 1;
        $data->save();
        return response()->json(['success' => true]);
    }
}
