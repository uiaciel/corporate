<?php

namespace App\Imports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Report([
            'title'  => $row['judul'],
            'slug' => $row['slug'],
            'status' => $row['status'],
            'category' => $row['category'],
            'datepublish' => $row['datepublish'],
            'image' => $row['image'],
            'pdf' => $row['pdf'],
        ]);
    }
}
