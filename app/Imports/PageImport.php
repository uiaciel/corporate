<?php

namespace App\Imports;

use App\Models\Page;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PageImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Page([
            'title_id'  => $row['title_id'],
            'slug_id' => $row['slug_id'],
            'title_en' => $row['title_en'],
            'slug_en' => $row['slug_en'],
            'content_id' => $row['content_id'],
            'content_en' => $row['content_en'],
            'category' => $row['category'],
            'datepublish' => $row['datepublish'],
            'pdf_id' => $row['pdf_id'],
            'pdf_en' => $row['pdf_en'],
            'count' => $row['count'],
            'status' => $row['status'],

        ]);
    }
}
