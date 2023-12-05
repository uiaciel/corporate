<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Auth::routes();
Route::get('/contact-us', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::post('/send-contact', [App\Http\Controllers\FrontController::class, 'sendcontact'])->name('formcontact');
Route::get('/reports', [App\Http\Controllers\FrontController::class, 'reports'])->name('reports');


Route::prefix('admincp')->middleware(['auth'])->group(function () {
        Route::get('/', [App\Http\Controllers\AdmincpController::class, 'index'])->name('admincp');
        Route::resource('/settings', App\Http\Controllers\SettingController::class);
        Route::resource('/landingpages', App\Http\Controllers\LandingpageController::class);
        Route::resource('/pages', App\Http\Controllers\PageController::class);
        Route::resource('/categories', App\Http\Controllers\CategoryController::class);
        Route::resource('/posts', App\Http\Controllers\PostController::class);
        Route::resource('/careers', App\Http\Controllers\CareerController::class);
        Route::resource('/announcements', App\Http\Controllers\AnnouncementController::class);
        Route::resource('/reports', App\Http\Controllers\ReportController::class);
        Route::resource('/contacts', App\Http\Controllers\ContactController::class);

        Route::post('/upload', [App\Http\Controllers\AdmincpController::class, 'tinymce'])->name('upload');
        Route::get('/testupload', [App\Http\Controllers\AdmincpController::class, 'testtinymce'])->name('testupload');

});

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front');
Route::get('/{slug}', [App\Http\Controllers\FrontController::class, 'page'])->name('page');
Route::get('/{lang}/media/{slug}', [App\Http\Controllers\FrontController::class, 'article'])->name('article');

Route::get('/category/{slug}', [App\Http\Controllers\FrontController::class, 'category'])->name('category');
Route::get('/announcement/{slug}', [App\Http\Controllers\FrontController::class, 'announcement'])->name('announcement');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

