<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admincp.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admincp.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_id' => 'required|max:255',
            'content_id' => 'required',

        ]);

        $page = new Page;

        $page->title_id = $request->title_id;
        $page->slug_id = Str::slug($request->title_id);
        $page->content_id = $request->content_id;

        if($request->title_en == NULL) {
            $page->title_en = $request->title_id;
            $page->slug_en = Str::slug($request->title_id);
        } else {
            $page->title_en = $request->title_en;
            $page->slug_en = Str::slug($request->title_en);
        }

        if($request->content_en == NULL) {
            $page->content_en = $request->content_id;
        } else {
            $page->content_en = $request->content_en;
        }

        $page->datepublish = $request->datepublish;

        if ($request->hasFile('pdf_id')) {

        $originName = $request->file('pdf_id')->getClientOriginalName();
        $slugName = str_replace(' ', '_', $originName);
        $fileName = time() . '_' . $slugName;
        $request->file('pdf_id')->move(public_path() . '/storage/files/', $fileName);

        $pdf_id = 'files/' . $fileName;
        $page->pdf_id = $pdf_id;

            if($request->hasFile('pdf_en')) {
                $originName = $request->file('pdf_en')->getClientOriginalName();
                $slugName = str_replace(' ', '_', $originName);
                $fileName = time() . '_' . $slugName;
                $request->file('pdf_en')->move(public_path() . '/storage/files/', $fileName);

                $pdf_en = 'files/' . $fileName;
                $page->pdf_en = $pdf_en;
            } else {
                $page->pdf_en = $pdf_id;
            }

        }

        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admincp.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $page->update($request->all());
        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->back()->with('success', 'Page deleted successfully.');
    }
}
