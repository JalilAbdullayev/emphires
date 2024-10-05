<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TeamController;
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
        Route::controller(AboutController::class)->name('about')->group(function() {
            Route::get('about', 'index')->name('_en');
            Route::get('haqqimizda', 'index')->name('_az');
            Route::get('o-nas', 'index')->name('_ru');
            Route::post('about', 'update');
        });
        Route::controller(CategoryController::class)->name('categories.')->group(function() {
            Route::prefix('categories')->group(function() {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('kateqoriyalar')->group(function() {
                Route::get('/', 'index')->name('index_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kateqori')->group(function() {
                Route::get('/', 'index')->name('index_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });
        Route::controller(ServiceController::class)->name('services.')->group(function() {
            Route::prefix('services')->group(function() {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('xidmetler')->group(function() {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('usluqi')->group(function() {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(TeamController::class)->name('team.')->group(function() {
            Route::prefix('team')->group(function() {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('komanda')->group(function() {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('briqada')->group(function() {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
