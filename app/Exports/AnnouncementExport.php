<?php

namespace App\Exports;

use App\Models\Announcement;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnnouncementExport implements FromQuery, WithHeadings, WithMapping
{
    
    use Exportable;

    public function query()
    {
        return Announcement::query();
    }

    public function headings(): array
    {
        return [
            'title',
            'slug',
            'content',
            'category',
            'datepublish',
            'image',
            'pdf',
            'homepage',
            'status',
        ];
    }

    public function map($announcements): array
    {
        return [
            $announcements->title,
            $announcements->slug,
            $announcements->content,
            $announcements->category,
            $announcements->datepublish,
            $announcements->image,
            $announcements->pdf,
            $announcements->homepage,
            $announcements->status,
        ];
    }



}
