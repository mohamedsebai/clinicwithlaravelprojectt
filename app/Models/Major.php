<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'img'];


    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

    public function booking()
    {
        return $this->hasManyThrough(Booking::class, Doctor::class, 'major_id', 'doctor_id');
    }

}
