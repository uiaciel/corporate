<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return view('admincp.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admincp.careers.create');
    }

    public function store(Request $request)
    {
        // Career::create($request->all());

        $career = new Career;
        $career->title = $request->title;
        $career->slug = Str::slug($request->title);
        $career->content = $request->content;
        $career->excerpt = $request->excerpt;
        $career->save();

        return redirect()->route('careers.index');
    }

    public function edit(Career $career)
    {
        return view('admincp.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $career->update($request->all());
        return redirect()->route('careers.index');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->back();
    }
}
