<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'details',
        'color',
        'brand',
        'size',
        'image',
        'price',
    ];
}
