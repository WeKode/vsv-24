<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type'
    ];

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

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

}
