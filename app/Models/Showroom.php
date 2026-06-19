<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'phone',
        'email',
        'address',
        'google_map',
        'status',
    ];
}
