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
//        'short_description',
        'old_price',
        'description',
        'brand_id',
        'price',
        'type',
        'affiliate_link',
        'is_available'
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
        return 100 - round(($this->price * 100 )/ $this->old_price);
    }

    public function getDisplayAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Display');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getResolutionAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Resolution');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getCameraAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Camera');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getRamAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Ram');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getBatteryAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Battery');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getOsAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Operating system');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getSimCardFormatAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Sim card format');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getSimAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Sim');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getColourAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Colour');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getBluetoothAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Bluetooth');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getRomAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Rom');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getDataVolumeAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Data volume');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getSimCardOptionsAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Sim card options');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getNumberPortabilityAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Number portability');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getTariffTypeAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Tariff type');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getDataSpeedAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Data speed');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getContractDurationAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Contract duration');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getAnnualConsumptionAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Annual consumption');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getDownPaymentAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Down payment');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getRenewalAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Renewal');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getNoticePeriodAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Notice period
');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getUseAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Use');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }

    public function getGreenElectricityAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q)
        {
            $q->where('name', 'Rom');
        })->first();
        if ($value)
        {
            return $value->name;
        }else{
            return 'Not specified';
        }
    }
    public function getTariffAttribute()
    {
        $value = $this->attribute_values()->whereHas('attribute', function ($q) {
            $q->where('name', 'Rom');
        })->first();
        if ($value) {
            return $value->name;
        } else {
            return 'Not specified';
        }
    }
//    public function getRomAttribute()
//    {
//        $value = $this->attribute_values()->whereHas('attribute', function ($q)
//        {
//            $q->where('name', 'Rom');
//        })->first();
//        if ($value)
//        {
//            return $value->name;
//        }else{
//            return 'Not specified';
//        }
//    }
//    public function getRomAttribute()
//    {
//        $value = $this->attribute_values()->whereHas('attribute', function ($q)
//        {
//            $q->where('name', 'Rom');
//        })->first();
//        if ($value)
//        {
//            return $value->name;
//        }else{
//            return 'Not specified';
//        }
//    }
//    public function getRomAttribute()
//    {
//        $value = $this->attribute_values()->whereHas('attribute', function ($q)
//        {
//            $q->where('name', 'Rom');
//        })->first();
//        if ($value)
//        {
//            return $value->name;
//        }else{
//            return 'Not specified';
//        }
//    }
//    public function getRomAttribute()
//    {
//        $value = $this->attribute_values()->whereHas('attribute', function ($q)
//        {
//            $q->where('name', 'Rom');
//        })->first();
//        if ($value)
//        {
//            return $value->name;
//        }else{
//            return 'Not specified';
//        }
//    }
//    public function getRomAttribute()
//    {
//        $value = $this->attribute_values()->whereHas('attribute', function ($q)
//        {
//            $q->where('name', 'Rom');
//        })->first();
//        if ($value)
//        {
//            return $value->name;
//        }else{
//            return 'Not specified';
//        }
//    }
//    public function getRomAttribute()
//    {
//        $value = $this->attribute_values()->whereHas('attribute', function ($q)
//        {
//            $q->where('name', 'Rom');
//        })->first();
//        if ($value)
//        {
//            return $value->name;
//        }else{
//            return 'Not specified';
//        }
//    }
    public function scopeLatest($query)
    {
        return $query->latest();
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
