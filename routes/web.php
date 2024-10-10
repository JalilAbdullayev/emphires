<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\WhyusController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\TestimonialController;

Route::get('/', function () {
    return view('welcome');
});

$locale = Request::segment(1);

if (in_array($locale, ['az', 'ru'])) {
    $locale = Request::segment(1);
} else {
    $locale = '';
}

Route::group([
    'prefix' => $locale,
    function ($locale = null) {
        return $locale;
    },
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => SetLocale::class
], function () {
    Route::controller(SiteController::class)->group(function () {
        Route::get('/', 'index')->name('home');

        Route::name('about_')->group(function () {
            Route::get('about', 'about')->name('en');
            Route::get('haqqimizda', 'about')->name('az');
            Route::get('o-nas', 'about')->name('ru');
        });
    });

    Route::post('message', [MessageController::class, 'store'])->name('message');

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::controller(SettingsController::class)->name('settings')->group(function () {
            Route::get('settings', 'index')->name('_en');
            Route::get('parametrler', 'index')->name('_az');
            Route::get('parametry', 'index')->name('_ru');
            Route::post('settings', 'update');
        });

        Route::controller(ContactController::class)->name('contact')->group(function () {
            Route::get('contact', 'index')->name('_en');
            Route::get('elaqe', 'index')->name('_az');
            Route::get('svyaz', 'index')->name('_ru');
            Route::post('contact', 'update');
        });

        Route::controller(AboutController::class)->name('about')->group(function () {
            Route::get('about', 'index')->name('_en');
            Route::get('haqqimizda', 'index')->name('_az');
            Route::get('o-nas', 'index')->name('_ru');
            Route::post('about', 'update');
        });

        Route::controller(CategoryController::class)->name('categories.')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('kateqoriyalar')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kateqori')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(ServiceController::class)->name('services.')->group(function () {
            Route::prefix('services')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('xidmetler')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('usluqi')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(TeamController::class)->name('team.')->group(function () {
            Route::prefix('team')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('komanda')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('briqada')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(QualityController::class)->name('qualities.')->group(function () {
            Route::prefix('qualities')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('keyfiyyetler')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kachestva')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(SlideController::class)->name('slider.')->group(function () {
            Route::prefix('slider')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('slaydlar')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('slayder')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(BlogController::class)->name('blog.')->group(function () {
            Route::prefix('blog')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('bloq')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('stati')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(WhyusController::class)->name('whyus.')->group(function () {
            Route::prefix('who-we-are')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('biz-kimik')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kto-mi')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(ClientController::class)->name('clients.')->group(function () {
            Route::prefix('clients')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('mushteriler')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kliyenti')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(SkillController::class)->name('skills.')->group(function () {
            Route::prefix('skills')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('bacariqlar')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('naviki')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(MessageController::class)->name('messages.')->group(function () {
            Route::prefix('messages')->group(function () {
                Route::delete('delete/{id}', 'delete')->name('delete');

                Route::get('/', 'index')->name('index_en');
                Route::get('show/{id}', 'show')->name('show_en');
            });

            Route::prefix('mesajlar')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('bax/{id}', 'show')->name('show_az');
            });

            Route::prefix('soobsheniya')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('smotret/{id}', 'show')->name('show_ru');
            });
        });

        Route::controller(CourseController::class)->name('courses.')->group(function () {
            Route::prefix('courses')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('kurslar')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kursi')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::prefix('profile')->name('profile_')->group(function () {
                Route::get('/', 'index')->name('en');
                Route::patch('/', 'update')->name('update');
            });
            Route::get('profile/delete', 'delete')->name('profile.delete');
            Route::get('profil', 'índex')->name('profile_az');
            Route::get('akkaunt', 'index')->name('profile_ru');
        });

        Route::controller(UserController::class)->name('users.')->group(function () {
            Route::prefix('users')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::patch('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('istifadechiler')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('polzovateli')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(TestimonialController::class)->name('testimonials.')->group(function () {
            Route::prefix('testimonials')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('create', 'create')->name('create_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('sherhler')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('yarat', 'create')->name('create_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('kommentariy')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('sozdat', 'create')->name('create_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });

        Route::controller(HomeSectionController::class)->name('homepage')->group(function () {
            Route::get('homepage-sections', 'index')->name('_en');
            Route::get('ana-sehife-bolmeleri', 'index')->name('_az');
            Route::get('razdely-domashney-stranitsy', 'index')->name('_ru');
            Route::post('homepage-sections', 'update');
        });

        Route::controller(SocialController::class)->name('social.')->group(function () {
            Route::prefix('social-media')->group(function () {
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::post('status', 'status')->name('status');
                Route::post('sort', 'sort')->name('sort');

                Route::get('/', 'index')->name('index_en');
                Route::get('edit/{id}', 'edit')->name('edit_en');
            });

            Route::prefix('sosial-media')->group(function () {
                Route::get('/', 'index')->name('index_az');
                Route::get('redakte/{id}', 'edit')->name('edit_az');
            });

            Route::prefix('sotsialnyye-seti')->group(function () {
                Route::get('/', 'index')->name('index_ru');
                Route::get('izmenit/{id}', 'edit')->name('edit_ru');
            });
        });
    });
});

Auth::routes();
