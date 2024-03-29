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
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
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
                $modal = Announcement::where('status', 'Publish')->where('homepage', 'Yes')->orderBy('created_at', 'desc')->first();
                $client = new Client();
                // $url = 'https://www.google.com/finance/quote/SGER:IDX';
                // $url = 'https://www.idxchannel.com/stocks?index=SGER&indexdetail=stockexchang3';
                $url = 'https://www.idnfinancials.com/id/sger/pt-sumber-global-energy-tbk';
                $page = $client->request('GET', $url);
                $response = $client->request('GET', $url);

                if ($response->getStatusCode() == 200) {
                    $html = (string) $response->getBody();
                    $crawler = new Crawler($html);
                    // Scraping data
                    $calNode = $crawler->filter('span.c');
                    $dataNode = $crawler->filter('span.p');
                    $upNode = $crawler->filter('span.v');
                    if (!$calNode->count() || !$dataNode->count() || !$upNode->count()) {
                        $view->with([
                            'category' => Category::all(),
                            'berita' => Post::where('status', 'Publish')->orderBy('datepublish', 'desc')->limit(6)->get(),
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
                    } else {
                        $cal = $calNode->text();
                        $data = $dataNode->text();
                        $up = $upNode->text();
                        // Lakukan operasi dengan data yang diambil
                        $tanda = substr($cal, 0, 1);
                        $view->with([
                            'category' => Category::all(),
                            'berita' => Post::where('status', 'Publish')->orderBy('datepublish', 'desc')->limit(6)->get(),
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
                    }
                }
            }
        );
    }
}
