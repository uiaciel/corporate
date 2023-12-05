<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landingpage extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'value_id',
        'value_en',
        'slug',
        'status',
    ];
}
