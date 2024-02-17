<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\landingpage;
use App\Models\Post;
use App\Models\Report;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Goutte\Client;

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
        \Carbon\Carbon::setLocale('id');

        view()->composer(
            '*',
            function ($view) {

                $client = new Client();
                // $url = 'https://www.google.com/finance/quote/SGER:IDX';
                // $url = 'https://www.idxchannel.com/stocks?index=SGER&indexdetail=stockexchang3';
                $url = 'https://www.idnfinancials.com/id/sger/pt-sumber-global-energy-tbk';
                $page = $client->request('GET', $url);

                $response = $client->getResponse();

                $modal = Announcement::where('status', 'Publish')->where('homepage', 'Yes')->orderBy('created_at', 'desc')->first();

                if ($response->getStatusCode() == 200) {

                    $cal = $page->filter('span.c')->text();
                    $tanda = substr($cal, 0, 1);
                    $data = $page->filter('span.p')->text();
                    $up = $page->filter('span.v')->text();


                    $view->with([
                        'category' => Category::all(),
                        'berita' => Post::where('status', 'Publish')->orderBy('created_at', 'desc')->limit(6)->get(),
                        'beritaterbaru' => Post::where('status', 'publish')->orderBy('created_at', 'desc')->limit(8)
                        ->get(),
                        'menuprimary' => landingpage::where('slug', 'menu-primary')->first(),
                        'menusecondary' => landingpage::where('slug', 'menu-secondary')->first(),
                        'announs' => Announcement::where('status', 'Publish')->limit(3)->get(),
                        'data' => $data,
                        'cal' => $cal,
                        'tanda' => $tanda,
                        'up' => $up,
                        'modal' => $modal,
                        'setting' => Setting::where('id', 1)->first()
                    ]);

                } else {

                    $view->with([
                        'category' => Category::all(),
                        'berita' => Post::where('status', 'Publish')->orderBy('created_at', 'desc')->limit(6)->get(),
                        'beritaterbaru' => Post::where('status', 'publish')->orderBy('created_at', 'desc')->limit(8)
                        ->get(),
                        'menuprimary' => landingpage::where('slug', 'menu-primary')->first(),
                        'menusecondary' => landingpage::where('slug', 'menu-secondary')->first(),
                        'announs' => Announcement::where('status', 'Publish')->limit(3)->get(),
                        'data' => 'IDR',
                        'cal' => '-',
                        'tanda' => 'sedang ',
                        'up' => 'menghubungkan ke server ..',
                        'modal' => $modal,
                        'setting' => Setting::where('id', 1)->first()
                    ]);

                }


            }
        );
    }
}
