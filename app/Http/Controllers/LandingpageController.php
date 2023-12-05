<?php

namespace App\Http\Controllers;

use App\Models\landingpage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingpageController extends Controller
{
    public function index()
    {
        $landingpages = Landingpage::all();
        return view('admincp.landingpages.index', compact('landingpages'));
    }

    public function create()
    {
        return view('admincp.landingpages.create');
    }

    public function store(Request $request)
    {
        // Landingpage::create($request->all());

        $landingpage = new Landingpage;
        $landingpage->key = $request->key;
        $landingpage->slug = Str::slug($request->key);
        $landingpage->value_id = $request->value_id;
        $landingpage->value_en = $request->value_en;
        $landingpage->save();

        return redirect()->route('landingpages.index')->with('success', 'Setting created successfully.');
    }

    public function edit(Landingpage $landingpage)
    {
        return view('admincp.landingpages.edit', compact('landingpage'));
    }

    public function update(Request $request, Landingpage $landingpage)
    {
        $landingpage->update($request->all());
        return redirect()->route('landingpages.index')->with('success', 'Setting created successfully.');
    }

    public function destroy(Landingpage $landingpage)
    {
        $landingpage->delete();
        return redirect()->back()->with('success', 'Setting delete successfully.');
    }

}
