<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'image', 'disccount', 'description'];

    protected function  image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => request()->routeIs('app.home') ? 'storage/' . $value : $value,
        );
    }
}
