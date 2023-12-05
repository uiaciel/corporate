<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\landingpage;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);




        view()->composer(
            '*',
            function ($view) {

                $modal = Announcement::where('status', 'Publish')->orderBy('created_at', 'desc')->first();

                $view->with([
                    'category' => Category::all(),
                    'berita' => Post::where('status', 'publish')->orderBy('created_at', 'DESC')->limit(4)->get(),
                    'menuprimary' => landingpage::where('slug', 'menu-primary')->first(),
                    'menusecondary' => landingpage::where('slug', 'menu-secondary')->first(),
                    // 'menus' => Menu::all(),
                    // 'pages' => Page::all(),
                    // 'announs' => Announs::where('status', 'Publish')->limit(3)->get(),
                    // 'laporans' => Report::Orderby('date_gmt', 'desc')->where('status', 'Publish')->limit(4)->get(),
                    // 'publicoffering' => Report::Orderby('date_gmt', 'desc')->where('status', 'Publish')->where('category', 'Public Offering Prospectus')->limit(12)->get(),
                    // 'pagepublish' => $pagepublish,
                    // 'docs' => Doc::all(),

                    // 'data' => $data,
                    // 'cal' => $cal,
                    // 'tanda' => $tanda,
                    // 'up' => $up,
                    'modal' => $modal,
                    'setting' => Setting::where('id', 1)->first()
                    // 'postpublish' => $postpublish
                ]);
            }
        );
    }
}
