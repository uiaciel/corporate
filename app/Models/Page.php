<?php

namespace App\Models;

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
}
