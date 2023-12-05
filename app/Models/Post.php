<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id',
        'title_en',
        'slug_id',
        'slug_en',
        'category_id',
        'content_id',
        'content_en',
        'excerpt_id',
        'excerpt_en',
        'datepublish',
        'status',
    ];

    public function gambar_id()
    {
        // preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $this->konten, $image);
        preg_match_all('@src="([^"]+)"@', $this->content_id, $match);

        $src = array_pop($match);

        return $src;
    }

    public function gambar_en()
    {
        // preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $this->konten, $image);
        preg_match_all('@src="([^"]+)"@', $this->content_en, $match);

        $src = array_pop($match);

        return $src;
    }

    public function tanggal()
    {
        return Carbon::parse($this->datepublish)->format('d F Y');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
