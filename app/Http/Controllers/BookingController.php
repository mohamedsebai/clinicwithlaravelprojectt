<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{


    public function store(BookingRequest $request , $doctor_id){

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'doctor_id' => $doctor_id
        ]);
        return redirect()->route('front.doctors.show', $doctor_id)->with('success' , 'Your Booking Has Been Sent');
    }
}
