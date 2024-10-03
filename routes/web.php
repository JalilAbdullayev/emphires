<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingsController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

$locale = Request::segment(1);

if(in_array($locale, ['az', 'ru'])) {
    $locale = Request::segment(1);
} else {
    $locale = '';
}

Route::group(['prefix' => $locale, function($locale = null) {
    return $locale;
}, 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => SetLocale::class], function() {
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::controller(SettingsController::class)->name('settings')->group(function() {
            Route::get('settings', 'index')->name('_en');
            Route::get('parametrler', 'index')->name('_az');
            Route::get('parametry', 'index')->name('_ru');
            Route::post('settings', 'update');
        });
        Route::controller(ContactController::class)->name('contact')->group(function() {
            Route::get('contact', 'index')->name('_en');
            Route::get('elaqe', 'index')->name('_az');
            Route::get('svyaz', 'index')->name('_ru');
            Route::post('contact', 'update');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
