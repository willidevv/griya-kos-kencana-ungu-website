<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // Ini wajib ada agar data bisa disimpan ke database
    protected $fillable = [
        'image',
        'caption',
        'is_visible'
    ];
}