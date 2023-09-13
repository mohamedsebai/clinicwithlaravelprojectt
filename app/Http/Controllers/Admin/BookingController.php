<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($doctor_id = null)
    {
        if($doctor_id == null){
            $bookings = Booking::paginate(2);
        }else{
            $bookings = Booking::where('doctor_id', $doctor_id)->paginate(2);
        }
        $doctors = Doctor::get();
            return view('admin.bookings.bookings_list',compact('bookings', 'doctors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::get();
        return view('admin.bookings.add_booking',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'doctor_id' => $request->doctor_id
        ]);

        return back()->with('success' , 'Your Booking Has Been Done successfully');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $doctors = Doctor::get();
        return view('admin.bookings.update_booking', compact('booking','doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->update([
            'name'  =>  $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('success' , 'Your Booking Has Been updated successfully');
    }


    public function updateStatus(Booking $booking, $status){
        $booking->update([
            'status'  => $status,
        ]);

        return back()->with('success' , 'Your Booking Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
