<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['judul','tanggal','waktu_mulai','waktu_selesai','deskripsi','lokasi'];
    use HasFactory;
}
