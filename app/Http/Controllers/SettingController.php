<?php

namespace App\Http\Controllers;

use App\Exports\SettingExport;
use App\Imports\SettingImport;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export()
    {
        $carbon = Carbon::now()->format('F');
        $setting = Setting::where('id', 1)->first();
        $nama = $setting->url;

        return Excel::download(new SettingExport, 'backup-' . $nama . '-' . $carbon . '-setting.xlsx',  \Maatwebsite\Excel\Excel::XLSX);
    }

    public function import(Request $request)
    {


        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->getClientOriginalName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        Setting::find(1)->delete();
        DB::statement('ALTER TABLE settings AUTO_INCREMENT = 0');

        // import data
        $import = Excel::import(new SettingImport, storage_path('app/public/excel/'.$nama_file));

        if (Storage::disk('public')->exists('excel/' . $nama_file)) {
            Storage::disk('public')->delete('excel/' . $nama_file);
        }

        if($import) {
            //redirect
            return redirect()->route('settings.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('settings.index')->with(['error' => 'Data Gagal Diimport!']);
        }


    }

}
