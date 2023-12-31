<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','password','phone','status','location','doctor_id'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }



}
