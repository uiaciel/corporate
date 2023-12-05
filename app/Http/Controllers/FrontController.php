<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\Contact;
use App\Models\landingpage;
use App\Models\Page;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $landingpage = landingpage::All();
        $posts = Post::where('status', 'Publish')->latest();

        return view('frontend.index', compact('landingpage', 'posts'));
    }

    public function article($lang, $slug)
    {
        if($lang == 'id') {
            $post = Post::where('slug_id', $slug)->first();
        }

        else {
            $post = Post::where('slug_en', $slug)->first();
        }


        return view('frontend.article', [
            'post' => $post,
            'lang' => $lang
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('frontend.category', [
            'categories' => $category,
        ]);
    }

    public function page($slug)
    {
        $page = Page::where('slug_id', $slug)->orWhere('slug_en', $slug)->first();

        return view('frontend.page', compact('page'));
    }

    public function announcement($slug)
    {
        $announcement = Announcement::where('slug', $slug)->first();

        return view('frontend.announcement', [
            'announcement' => $announcement,
        ]);
    }

    public function reports()
    {
        $reports = Report::All();

        return view('frontend.reports', compact('reports'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function sendcontact(Request $request)
    {
        $contact = new Contact;
        $contact->sender = $request->sender;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->email = $request->email;
        $contact->save();

        return redirect()->back()->with('message', 'Pesan berhasil terkirim');
    }
}
