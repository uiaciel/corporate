<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

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
}
