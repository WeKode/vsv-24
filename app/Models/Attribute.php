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
