<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index()
    {
        $posts = Report::OrderBy('datepublish', 'desc')

            ->get();

        return view('admincp.reports.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('admincp.reports.create');
    }

    public function edit(Report $laporan)
    {
        return view('admincp.reports.edit', compact('laporan'));
    }

    public function store(Request $request)
    {

        $originName = $request->file('files')->getClientOriginalName();
        $slugName = str_replace(' ', '_', $originName);
        $fileName = time() . '_' . $slugName;
        $request->file('files')->move(public_path() . '/storage/reports/', $fileName);

        $url = 'reports/' . $fileName;

        $originimages = $request->file('images')->getClientOriginalName();
        $slugimages = str_replace(' ', '_', $originimages);
        $fileimages = time() . '_' . $slugimages;
        $request->file('images')->move(public_path() . '/storage/reports/', $fileimages);

        $urlimages = 'reports/' . $fileimages;

        $laporan = new Report;
        $laporan->title = $request->title;
        $laporan->slug = Str::slug($request->title);
        $laporan->category = $request->category;
        $laporan->datepublish = $request->datepublish;
        $laporan->status = $request->status;
        $laporan->content = $request->content;
        $laporan->image = $urlimages;
        $laporan->pdf = $url;
        $laporan->save();

        return redirect()->route('reports.index')
            ->with('success', 'Report created successfully.');
    }

    public function update(Request $request, $id)
    {

        $laporan = Report::find($id);

        $laporan->title = $request->title;
        $laporan->slug = Str::slug($request->title);
        $laporan->category = $request->category;
        $laporan->datepublish = $request->datepublish;
        $laporan->status = $request->status;
        $laporan->content = $request->content;

        if ($request->hasFile('files')) {

            $originName = $request->file('files')->getClientOriginalName();
            $slugName = str_replace(' ', '_', $originName);
            $fileName = time() . '_' . $slugName;
            $request->file('files')->move(public_path() . '/storage/reports/', $fileName);

            $url = 'reports/' . $fileName;
            $laporan->pdf = $url;
        }

        if ($request->hasFile('images')) {

        $originimages = $request->file('images')->getClientOriginalName();
        $slugimages = str_replace(' ', '_', $originimages);
        $fileimages = time() . '_' . $slugimages;
        $request->file('images')->move(public_path() . '/storage/reports/', $fileimages);

        $urlimages = 'reports/' . $fileimages;
        $laporan->image = $urlimages;

        }

        $laporan->save();

        return
            redirect()->route('reports.index')

            ->with('success', 'Report updated successfully.');
    }

    public function showlist()
    {

        $annualfeature = Report::OrderBy('datepublish', 'desc')
            ->where('status', 'Publish')
            ->where('category', 'Annual Report')
            ->get();

        $laps = Report::OrderBy('datepublish', 'desc')
            ->where('status', 'Publish')
            ->get();

        return view('frontend.report', [
            'laps' => $laps,
            'annuals' => $annualfeature
        ]);
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}
