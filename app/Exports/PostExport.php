<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Post::query();
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
            'excerpt_id',
            'excerpt_en',
            'category_id',
            'datepublish',
            'layouts',
            'count',
            'status',
        ];
    }

    public function map($posts): array
    {
        return [
            $posts->title_id,
            $posts->slug_id,
            $posts->title_en,
            $posts->slug_en,
            $posts->content_id,
            $posts->content_en,
            $posts->category_id,
            $posts->excerpt_id,
            $posts->excerpt_en,
            $posts->datepublish,
            $posts->layouts,
            $posts->count,
            $posts->status,
        ];
    }
}
