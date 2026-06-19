<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Frontend Routes ───────────────────────────────────────
Route::get('/', [FrontendController::class, 'home']);
Route::get('/cars', [FrontendController::class, 'cars']);
Route::get('/car/{slug}', [FrontendController::class, 'carDetails']);
Route::get('/about-us', [FrontendController::class, 'about'])->name('about-us');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'storeMessage'])->name('contact.store');
Route::get('/showrooms', [FrontendController::class, 'showrooms'])->name('showrooms');
// ─── Admin Routes ──────────────────────────────────────────
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/', 'admin.dashboard')->name('dashboard');

        Route::resource('cars', CarController::class);

        Route::resource('banners', BannerController::class);

        Route::resource('showrooms', ShowroomController::class);

        // Messages
        Route::get('messages', [MessageController::class, 'index'])
            ->name('messages.index');
        Route::patch('messages/{message}/toggle-done', [MessageController::class, 'toggleDone'])
            ->name('messages.toggleDone');

        // Settings
        Route::get('settings/edit', [SettingController::class, 'edit'])
            ->name('settings.edit');
        Route::put('settings/update', [SettingController::class, 'update'])
            ->name('settings.update');

        // Social Media
        Route::get('social-media/edit', [SocialMediaController::class, 'edit'])
            ->name('social-media.edit');
        Route::put('social-media/update', [SocialMediaController::class, 'update'])
            ->name('social-media.update');

        // About Us
        Route::get('about-us/edit', [AboutUsController::class, 'edit'])
            ->name('about-us.edit');
        Route::put('about-us/update', [AboutUsController::class, 'update'])
            ->name('about-us.update');
        // About Us image upload
        Route::post('/upload-image', [UploadController::class, 'store'])->name('upload.image');
    });

// ─── Profile Routes ────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
