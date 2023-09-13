<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guard = "doctor";

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'img',
        'summary',
        'city_id',
        'major_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function city(){
        return $this->belongsTo(City::class);
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function rates(){
        return $this->hasMany(rates::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

}
