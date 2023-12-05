<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_id',
        'title_en',
        'slug_id',
        'slug_en',
        'language',
        'post_id',
        'count',
        'content_id',
        'content_en',
        'category',
        'datepublish',
        'status',
    ];

    public function tanggal()
    {
        return Carbon::parse($this->datepublish)->format('d F Y');
    }

}
