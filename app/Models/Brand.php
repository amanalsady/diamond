<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'image', 'facebook', 'twitter', 'instagram'];


    protected function  image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => request()->routeIs('app.home') ? 'storage/' . $value : $value,
        );
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
