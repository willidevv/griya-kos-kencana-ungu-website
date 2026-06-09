<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model // Pastikan nama Class diawali huruf kapital
{
    use HasFactory;

    // Hubungkan ke tabel 'fasilitas' di database
    protected $table = 'fasilitas';

    protected $fillable = [
        'name',
        'category',
        'image',
        'facilities',
        'users_id',
    ];
}