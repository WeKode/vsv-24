<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use function Sodium\add;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'birth_date', 'zip_code', 'city', 'country', 'address', 'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'pic_url'
    ];

    public function getPicUrlAttribute()
    {
        if (Str::contains($this->pic,'http'))
        {
            return $this->pic;
        }

        return $this->pic ? asset('storage/'.$this->pic) : asset('assets/dist/img/default-150x150.png');
    }

    public function addressFromat()
    {
        return $this->address .", ".$this->zip_code. ', '.$this->city.', '.$this->country;
    }


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->using(Cart::class)
            ->withPivot(['qte'])->withTimestamps();
    }

    public function socialAccounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SocialAccount::class);
    }
}
