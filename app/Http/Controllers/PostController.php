<?php

namespace App\Http\Controllers;

use App\Imports\PostImport;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::OrderBy('created_at', 'desc')->paginate(5);
        return view('admincp.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admincp.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title_id' => 'required|max:255',
            'content_id' => 'required',

        ]);

        $post = new Post;
        $post->title_id = $request->title_id;
        $post->slug_id = Str::slug($request->title_id);
        $post->content_id = $request->content_id;
        $post->excerpt_id = Str::of(strip_tags($request->content_id))->words(30, ' ....');

        if($request->title_en == NULL) {
            $post->title_en = $request->title_id;
            $post->slug_en = Str::slug($request->title_id);
        } else {
            $post->title_en = $request->title_en;
            $post->slug_en = Str::slug($request->title_en);
        }

        if($request->content_en == NULL) {
            $post->content_en = $request->content_id;
            $post->excerpt_en = Str::of(strip_tags($request->content_id))->words(30, ' ....');
        } else {
            $post->content_en = $request->content_en;
            $post->excerpt_en = Str::of(strip_tags($request->content_en))->words(30, ' ....');
        }

        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->datepublish = $request->datepublish;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admincp.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function show(Post $post)
    {
        return view('admincp.posts.show', compact('post'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->getClientOriginalName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new PostImport(), storage_path('app/public/excel/'.$nama_file));

        if (Storage::disk('public')->exists('excel/'. $nama_file)) {
            Storage::disk('public')->delete('excel/'. $nama_file);
        }

        if($import) {
            //redirect
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Diimport!']);
        }


    }
}
