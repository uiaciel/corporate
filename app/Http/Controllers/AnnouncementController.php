<?php
namespace App\Http\Controllers;
use App\Exports\AnnouncementExport;
use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('admincp.announcements.index', compact('announcements'));
    }
    
    public function create()
    {
        return view('admincp.announcements.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'images' => 'required|mimes:png,jpg,jpeg,gif',
            'pdf' => 'required',
            'datepublish' => 'required',
        ]);
        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->slug = Str::Slug($request->title);
        $announcement->category = $request->category;
        $announcement->content = $request->content;
        $announcement->datepublish = $request->datepublish;
        $announcement->status = $request->status;
        if ($request->hasFile('images')) {
            $nama = time() . '-' . $request->file('images')->getClientOriginalName();
            $path = $request->file('images')->storeAs('images', $nama, ['disk' => 'public']);
            $announcement->image = $path;
        }
        if ($request->hasFile('pdf')) {
            $slugName = str_replace(' ', '_', $request->file('pdf')->getClientOriginalName());
            $fileName = time() . '_' . $slugName;
            $pdf = $request->file('pdf')->storeAs('pdf', $fileName, ['disk' => 'public']);
            $announcement->pdf = $pdf;
        }
        $announcement->save();
        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }
    
    public function edit(Announcement $announcement)
    {
        return view('admincp.announcements.edit', compact('announcement'));
    }
    
    public function update(Request $request, Announcement $announcement)
    {
        $announcement->title = $request->title;
        $announcement->slug = Str::Slug($request->title);
        $announcement->category = $request->category;
        $announcement->content = $request->content;
        $announcement->homepage = $request->homepage;
        $announcement->datepublish = $request->datepublish;
        $announcement->status = $request->status;
        if ($request->hasFile('images')) {
            $nama = time() . '-' . $request->file('images')->getClientOriginalName();
            $path = $request->file('images')->storeAs('images', $nama, ['disk' => 'public']);
            $announcement->image = $path;
        }
        if ($request->hasFile('pdf')) {
            $slugName = str_replace(' ', '_', $request->file('pdf')->getClientOriginalName());
            $fileName = time() . '_' . $slugName;
            $pdf = $request->file('pdf')->storeAs('pdf', $fileName, ['disk' => 'public']);
            $announcement->pdf = $pdf;
        }
        $announcement->save();
        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }
    
    public function destroy(Announcement $announcement)
    {
        if (Storage::disk('public')->exists($announcement->pdf)) {
            Storage::disk('public')->delete($announcement->pdf);
        }
        if (Storage::disk('public')->exists($announcement->image)) {
            Storage::disk('public')->delete($announcement->image);
        }
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
    }

    public function export()
    {
        $carbon = Carbon::now()->format('F');
        return Excel::download(new AnnouncementExport, 'backup-Announcement' . '-' . $carbon . '.xlsx',  \Maatwebsite\Excel\Excel::XLSX);
    }
}
