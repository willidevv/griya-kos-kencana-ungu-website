<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Tambahkan baris ini
    protected $fillable = [
        'id', 
        'phone', 
        'maps_iframe',
        'users_id'

    ];
}