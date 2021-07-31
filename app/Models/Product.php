<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * @var string[] 
     */
    protected $fillable = [
        'name',
        'meta',
        'short_description',
        'old_price',
        'description',
        'price'
    ];

    public function getImgUrlAttribute()
    {
        return $this->images()->first() ? 'storage/'.$this->images()->first()->path : 'default';
    }

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
}
