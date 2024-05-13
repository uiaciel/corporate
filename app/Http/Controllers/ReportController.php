<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Imports\ReportImport;
use App\Models\Announcement;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $posts = Report::OrderBy('datepublish', 'desc')->get();

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
        $request->validate([
            'files' => 'required',
            'title' => 'required',
            'category' => 'required',
            'datepublish' => 'required',
        ]);

        $laporan = new Report;
        $laporan->title = $request->title;
        $laporan->slug = Str::slug($request->title);
        $laporan->category = $request->category;
        $laporan->datepublish = $request->datepublish;
        $laporan->status = $request->status;
        $laporan->content = $request->content;

        if ($request->hasFile('files')) {
            $pdf = $request->file('files');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();

            // Simpan file PDF
            $pdf->storeAs('public/reports', $pdfName);

            // Konversi halaman pertama PDF menjadi gambar
            $imagick = new \Imagick();
            $imagick->setResolution(72, 72);
            $imagick->readImage($pdf->getRealPath() . '[0]');
            $imagick->setImageFormat('jpeg');

            // Simpan gambar dengan nama file PDF ditambah dengan "_cover.webp" di direktori 'public/reports'
            $imagePath = Storage::disk('public')->path('reports/' . $pdfName . '_cover.webp');
            $imagick->writeImage($imagePath);
            $laporan->image = 'reports/' . $pdfName . '_cover.webp';

            // Simpan path PDF
            $laporan->pdf = 'reports/' . $pdfName;
        }

        $laporan->save();

        if ($request->announcement == 'YES') {

            $announcement = new Announcement;
            $announcement->title = $request->title;
            $announcement->slug = Str::Slug($request->title);
            $announcement->category = $request->category;
            $announcement->content = $request->content;
            $announcement->datepublish = $request->datepublish;
            $announcement->status = $request->status;
            $announcement->image = 'reports/' . $pdfName . '_cover.webp';
            $announcement->pdf = 'reports/' . $pdfName;
            $announcement->save();
        }

        return redirect()->route('reports.index')
            ->with('success', 'Report created successfully.');
    }

    public function import(Request $request)
    {

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->getClientOriginalName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new ReportImport(), storage_path('app/public/excel/' . $nama_file));

        if (Storage::disk('public')->exists('excel/' . $nama_file)) {
            Storage::disk('public')->delete('excel/' . $nama_file);
        }

        if ($import) {
            //redirect
            return redirect()->route('reports.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('reports.index')->with(['error' => 'Data Gagal Diimport!']);
        }
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


        if (Storage::disk('public')->exists($report->pdf)) {
            Storage::disk('public')->delete($report->pdf);
        }

        if (Storage::disk('public')->exists($report->image)) {
            Storage::disk('public')->delete($report->image);
        }

        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }


    public function export()
    {
        $carbon = Carbon::now()->format('F');
        return Excel::download(new ReportExport, 'backup-Reports' . '-' . $carbon . '.xlsx',  \Maatwebsite\Excel\Excel::XLSX);
    }
}
