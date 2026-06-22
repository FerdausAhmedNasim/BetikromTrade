<?php

namespace App\Models;

use App\Models\CarImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Car extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'details',
        'color',
        'brand',
        'size',
        'image',
        'price',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($car) {
            $car->slug = Str::slug($car->name) . '-' . Str::random(5);
        });

        static::updating(function ($car) {
            if ($car->isDirty('name')) {
                $car->slug = Str::slug($car->name) . '-' . Str::random(5);
            }
        });
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}