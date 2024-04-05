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
        $posts = Post::OrderBy('datepublish', 'desc')->where('status', 'Publish')->take(6)->get();
        $reports = Report::where('category', '!=', 'Audit Committee Charter')->orderBy('datepublish', 'desc')->get();
        $accs = Report::where('category', 'Audit Committee Charter')->orderBy('datepublish', 'desc')->get();

        return view('frontend.index', compact('landingpage', 'posts', 'reports', 'accs'));
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

    public function announcements()
    {
        $announcements = Announcement::where('status', 'Publish')->get();

        return view('frontend.announcements', [
            'announcements' => $announcements,
        ]);
    }

    public function announcement($slug)
    {
        $announcement = Announcement::where('slug', $slug)->first();

        return view('frontend.announcement', [
            'announcement' => $announcement,
        ]);
    }

    public function acc()
    {
        $reports = Report::where('category', 'Audit Committee Charter')->orderBy('datepublish', 'desc')->get();

        return view('frontend.acc', compact('reports'));
    }

    public function reports()
    {
        $reports = Report::orderBy('datepublish', 'desc')->get();

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
