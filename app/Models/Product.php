<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['image', 'name', 'price', 'disccount', 'brand_id', 'code'];

    protected $casts = [
        'price' => 'float',
        'disccount' => 'float',
    ];

    protected function finalPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value, array $attributes) => $attributes['price'] - ($attributes['price'] * $attributes['disccount'] / 100),
        );
    }

    protected function  image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => request()->routeIs('app.home') ? 'storage/' . $value : $value,
        );
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
