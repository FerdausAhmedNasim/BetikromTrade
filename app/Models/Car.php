<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($car) {

            $car->slug = Str::slug($car->name);

        });
    }
}
