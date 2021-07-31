<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta',
        'price',
        'brand_id'
    ];

    public function getImgUrlAttribute()
    {
        return $this->images()->first() ? 'storage/'.$this->images()->first()->path : 'default';
    }

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(Cart::class)
            ->withPivot(['qte'])->withTimestamps();
    }
}
