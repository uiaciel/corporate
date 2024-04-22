<?php

namespace App\Exports;

use App\Models\Page;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PageExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
   
    public function query()
    {
        return Page::query();
    }

    public function headings(): array
    {
        return [
            'title_id',
            'slug_id',
            'title_en',
            'slug_en',
            'content_id',
            'content_en',
            'category',
            'datepublish',
            'pdf_id',
            'pdf_en',
            'count',
            'status',
        ];
    }

    public function map($pages): array
    {
        return [
            $pages->title_id,
            $pages->slug_id,
            $pages->title_en,
            $pages->slug_en,
            $pages->content_id,
            $pages->content_en,
            $pages->category,
            $pages->datepublish,
            $pages->pdf_id,
            $pages->pdf_en,
            $pages->count,
            $pages->status,
        ];
    }

    
}
