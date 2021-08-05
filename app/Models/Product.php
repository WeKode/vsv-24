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

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'meta',
        'short_description',
        'old_price',
        'description',
        'brand_id',
        'price',
        'type',
        'affiliate_link'
    ];

    /**
     * @return string
     */
    public function getImgUrlAttribute(): string
    {
        return $this->images()->first() ? 'storage/'.$this->images()->first()->path : 'default';
    }

    public function getPromotionAttribute(): string
    {
        return ($this->price * 100 )/ $this->old_price;
    }

    public function scopeSmartphones($query)
    {
        return $query->where('type', 1);
    }

    public function scopePhonePlans($query)
    {
        return $query->where('type', 2);
    }

    public function scopeEnergyPlans($query)
    {
        return $query->where('type', 3);
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

    public function attribute_values(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class)->withTimestamps();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->with(['total', 'price', 'qty'])->withTimestamps();
    }
}
