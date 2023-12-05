<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'image',
        'pdf',
        'datepublish',
        'status',
        'hit'
    ];

    public function tanggal()
    {
        return Carbon::parse($this->datepublish)->format('d F Y');
    }
}
