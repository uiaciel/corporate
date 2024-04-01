<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(['register' => false]);
Route::get('/contact-us', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::post('/send-contact', [App\Http\Controllers\FrontController::class, 'sendcontact'])->name('formcontact');
Route::get('/financial-reports', [App\Http\Controllers\FrontController::class, 'reports'])->name('financial.reports');
Route::get('/share-price', function () {
    return view('frontend.share');
});

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
        Route::post('/import/reports', [App\Http\Controllers\ReportController::class, 'import'])->name('reports.import');
        Route::post('/import/pages', [App\Http\Controllers\PageController::class, 'import'])->name('pages.import');
        Route::post('/import/posts', [App\Http\Controllers\PostController::class, 'import'])->name('posts.import');
        Route::post('/import/settings', [App\Http\Controllers\SettingController::class, 'import'])->name('settings.import');

        Route::get('/export/setting/', [App\Http\Controllers\SettingController::class, 'export'])->name('settings.export');
        Route::post('/pages/deletepdf/{id}', [App\Http\Controllers\PageController::class, 'deletefile'])->name('pages.deletefile');
    });

Route::redirect('/media/{slug}', '/en/media/{slug}', 301);
Route::redirect('/en/media-center', '/category/news', 301);

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front');
Route::get('/{slug}', [App\Http\Controllers\FrontController::class, 'page'])->name('page');
Route::get('/{lang}/media/{slug}', [App\Http\Controllers\FrontController::class, 'article'])->name('article');

Route::get('/category/{slug}', [App\Http\Controllers\FrontController::class, 'category'])->name('category');
Route::get('/announcement/{slug}', [App\Http\Controllers\FrontController::class, 'announcement'])->name('announcement');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

