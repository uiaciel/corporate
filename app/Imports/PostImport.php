<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Post([
            'title_id'  => $row['title'],
            'slug_id' => $row['slug'],
            'title_en' => $row['title'],
            'slug_en' => $row['slug'],
            'content_id' => $row['content'],
            'content_en' => $row['content'],
            'excerpt_id' => $row['excerpt'],
            'excerpt_en' => $row['excerpt'],
            'category_id' => $row['category_id'],
            'datepublish' => $row['datepublish'],
            'count' => $row['count'],
            'status' => $row['status'],
            'layouts' => $row['layout'],

        ]);
    }
}
