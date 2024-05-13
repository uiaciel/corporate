<?php
namespace App\Http\Controllers;
use App\Models\Page;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class AdmincpController extends Controller
{
    public function index()
    {
        return view('admincp.index');
    }

    public function tinymce(Request $request)
    {
        $originName = $request->file('file')->getClientOriginalName();
        $slugName = str_replace(' ', '_', $originName);
        $fileName = time() . '_' . $slugName;
     
        $convertedImage = Image::make($request->file('file'))->encode('webp', 60);
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME); // Ambil nama file tanpa ekstensi
        $newFileName = $fileNameWithoutExtension . '.webp'; // Buat nama file baru dengan ekstensi .webp

        Storage::put('public/images/' . $newFileName, $convertedImage->__toString());
        return response()->json(['location' => "/storage/images/$newFileName"]);
    }

    public function backup()
    {
        return view('admincp.backup');
    }

    public function sitemap()
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
        return 'Sitemap generated successfully.';
    }
}
