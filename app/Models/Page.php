<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'halaman_statis';
    protected $fillable = ['title','seo_title','content'];
    use HasFactory;
}
