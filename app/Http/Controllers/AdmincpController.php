<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Report;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class AdmincpController extends Controller
{
    public function index()
    {

        

        return view('admincp.index');
    }

    public function tinymce(Request $request)
    {
        $setting = Setting::where('id', 1)->first();

        $originName = $request->file('file')->getClientOriginalName();
        $slugName = str_replace(' ', '_', $originName);
        $fileName = time() . '_' . $slugName;
        $request->file('file')->move(public_path() . '/storage/images/', $fileName);
        return response()->json(['location' => "$setting->url/storage/images/$fileName"]);
    }

    public function backup()
    {
        return view('admincp.backup');
    }

    public function sitemap()
    {

        $sitemap = Sitemap::create(env('APP_URL'));
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
        
        return 'Sitemap generated successfully.';


    }
}
