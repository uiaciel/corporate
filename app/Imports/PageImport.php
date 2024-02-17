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
            'title_id'  => $row['title'],
            'slug_id' => $row['slug'],
            'title_en' => $row['title'],
            'slug_en' => $row['slug'],
            'content_id' => $row['content'],
            'content_en' => $row['content'],
            'category' => $row['category'],
            'datepublish' => $row['datepublish'],
            'count' => $row['count'],
            'status' => $row['status'],

        ]);
    }
}
