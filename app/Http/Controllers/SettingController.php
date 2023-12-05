<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        return view('admincp.settings.index', compact('setting'));
    }

    public function create()
    {
        return view('admincp.settings.create');
    }

    public function edit(Setting $setting)
    {
        return view('admincp.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

}
