<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    /**
     * @var string[]
     */
    protected $fillable = ['name','description', 'type'];


    public function getTypeNameAttribute()
    {
        switch ($this->type)
        {
            case '1':
                return 'smartphone';

            case '2':
                return 'mobile-service';

            case '3':
                return 'energy-service';

            default:
                return 'smartphone';
        }
    }

    public function scopeEditable($query)
    {
        return $query->where('is_editable', true);
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

    public function values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }



//    public function products()
//    {
//        return $this->belongsToMany(Product::class)
//            ->using(AttributeProduct::class)
//            ->withTimestamps();
//    }
}
