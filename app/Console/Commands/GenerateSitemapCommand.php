<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap with Command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $sitemap = Sitemap::create();
        $sitemap->add(Url::create(env('APP_URL')));
        $sitemap->add('/');
        $sitemap->add('/home');

        $pages = Page::all();
        foreach ($pages as $page) {
            $sitemap->add("/$page->slug_en");
        }

        $news = Post::all();
        foreach ($news as $post) {
            $sitemap->add("/id/media/$post->slug_id");
        }

        $newsen = Post::all();
        foreach ($newsen as $posts) {
            $sitemap->add("/en/media/$posts->slug_en");
        }

        $report = Report::all();
        foreach ($report as $report) {
            $sitemap->add("/report/$report->slug");
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        $this->info('Sitemap generated successfully.');
    }
}
